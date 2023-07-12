import time
import os
import csv
import sys
import pandas as pd 
from gpapi.googleplay import GooglePlayAPI
pd.options.mode.chained_assignment = None  # default='warn'

device_arg = sys.argv[1]
email_no = sys.argv[2]
#language = sys.argv[2]
print(email_no)
if (email_no == "0"):
 #reading email and app passwords from a csv file in dataframe df1
 df1 = pd.read_csv("devices_with_app_passwords_01.csv") #df1 specific functinality
 devices = df1['Code_Name'].values  # extracting 40 code_names in a numpy array in devices_array 
 
 #now setting Code_Name as index on a second dataframe df2
 df2 = pd.read_csv("devices_with_app_passwords_01.csv", index_col = 'Code_Name') #read a csv file and set index to column = Code_Name
 
 #setting the desired code_name as current login device for processing
 current_device_arr = df2.loc[device_arg, : ] #this array has read all values in this row
 
 ##### Playstore login ####
 print("Logging with this email: " + current_device_arr.Email) 
 print("Password: " + current_device_arr.App_Password)
 #playstore login code
 api = GooglePlayAPI("en_US", timezone = current_device_arr.TimeZone, device_codename = device_arg)
 api.login( email = current_device_arr.Email, password = current_device_arr.App_Password)
 #printing gsfId and authSubToken generated from Google Play Store
 print("gsfId: " + str(api.gsfId))
 print("authSubToken: " + str(api.authSubToken))
 ##### end of Playstore login ####
 
 #read gsfids_and_tokens in dataframe 3
 df3 = pd.read_csv("gsfids_and_tokens_01.csv")

 #replace gsfid and sub_token with newly generated ones into -> df3
 for i, row in df3.iterrows():
  if row.device == device_arg: #select the desired code_name
   # print('value if i = ')
   # print(i)
   df3.gsfid.iloc[i] = api.gsfId
   df3.sub_auth_token.iloc[i] = api.authSubToken
   df3.TimeZone.iloc[i] = current_device_arr.TimeZone
   break

 #now output the df3 -> into gsfids_and_tokens_01.csv
 df3.to_csv('gsfids_and_tokens_01.csv', index=False)

#for second auth email == 2
if (email_no == "2"):
 #reading email and app passwords from a csv file in dataframe df1
 df1 = pd.read_csv("devices_with_app_passwords_2.csv") #df1 specific functinality
 devices = df1['Code_Name'].values  # extracting 40 code_names in a numpy array in devices_array 
 
 #now setting Code_Name as index on a second dataframe df2
 df2 = pd.read_csv("devices_with_app_passwords_2.csv", index_col = 'Code_Name') #read a csv file and set index to column = Code_Name
 
 #setting the desired code_name as current login device for processing
 current_device_arr = df2.loc[device_arg, : ] #this array has read all values in this row
 
 ##### Playstore login ####
 print("Logging with this email: " + current_device_arr.Email) 
 print("Password: " + current_device_arr.App_Password)
 #playstore login code
 api = GooglePlayAPI("en_US", timezone = current_device_arr.TimeZone, device_codename = device_arg)
 api.login( email = current_device_arr.Email, password = current_device_arr.App_Password)
 #printing gsfId and authSubToken generated from Google Play Store
 print("gsfId: " + str(api.gsfId))
 print("authSubToken: " + str(api.authSubToken))
 ##### end of Playstore login ####
 
 #read gsfids_and_tokens in dataframe 3
 df3 = pd.read_csv("gsfids_and_tokens_2.csv")

 #replace gsfid and sub_token with newly generated ones into -> df3
 for i, row in df3.iterrows():
  if row.device == device_arg: #select the desired code_name
   # print('value if i = ')
   # print(i)
   df3.gsfid.iloc[i] = api.gsfId
   df3.sub_auth_token.iloc[i] = api.authSubToken
   df3.TimeZone.iloc[i] = current_device_arr.TimeZone
   break

 #now output the df3 -> into gsfids_and_tokens_01.csv
 df3.to_csv('gsfids_and_tokens_02.csv', index=False)