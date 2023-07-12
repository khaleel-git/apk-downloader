# This script wait for web to populate.
import time
import os
import csv
import sys
import argparse
import pandas as pd 
from gpapi.googleplay import GooglePlayAPI
pd.options.mode.chained_assignment = None  # default='warn'

#libraries for scrapping content
import json
from google_play_scraper import app

#command line arguments
app_id = sys.argv[1]
#device_arg = sys.argv[2]
device_arg = 'cloudbook'
#pandas read csv files
df1 = pd.read_csv("gsfids_and_tokens.csv") #df1 specific functinality
df2 = pd.read_csv("gsfids_and_tokens.csv", index_col = 'device') #read a csv file and set index to column = Code_Name
# df3 = pd.read_csv("gsfids_and_tokens.csv")
devices = df1['device'].values  # as a numpy array
device = df2.loc[device_arg, : ]
print(device.gsfid)
print(device.sub_auth_token)
print(device.TimeZone)


#now login
# api.login( email = device.Email, password = device.App_Password)
try: 
 print("i am in first try statement which has the device of cloudbook")
 print(device_arg)
 api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
 api.login(authSubToken = device.sub_auth_token, gsfId = device.gsfid)
except Exception as ex:
 print(ex)
 device_arg = 'fs454'
 try: 
  print(device_arg)
  api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
  api.login(authSubToken = device.sub_auth_token, gsfId = device.gsfid)
 except Exception as ex:
  print(ex)
  device_arg = 'maguro'
  try: 
   print(device_arg)
   api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
   api.login(authSubToken = device.sub_auth_token, gsfId = device.gsfid)
  except Exception as ex:
   print(ex)
   device_arg = 'nxtl09'
   try: 
    print(device_arg)
    api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
    api.login(authSubToken = device.sub_auth_token, gsfId = device.gsfid)    
   except Exception as ex:
    print(ex)

# api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
# api.login(authSubToken = device.sub_auth_token + '3fr', gsfId = device.gsfid)


#####Authentication using gsf token#######
# gsf_id = 4097084395647776328
# token ="BwjXX5qcRNYVQwwIjHZoUK9ZIJXILTIjfpXS3sWL3TkiyqLYoC-1CNpxqxZT78gbMGgotg."

# try:
#  api = GooglePlayAPI(locale="en_US", timezone="Europe/Kiev", device_codename="gemini")
#  api.login(authSubToken=token, gsfId=gsf_id)

# except Exception as ex:
#  print (ex)
#  device_arg = 'fs454'
#  api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
#  api.login(email = device.Email, password = device.App_Password)

# BULK DETAILS
# testApps = ["org.mozilla.focus", "com.niksoftware.snapseed"]
# bulk = api.bulkDetails(testApps)
# print(bulk)



# DETAILS
# print("\nGetting details for %s\n" % testApps[0])
# details = api.details(app_id)
# print(details)

# try:
#  with open("user_content/apk_json/" + app_id + '.json', 'w', encoding='utf-8') as f:
#   json.dump(details, f, ensure_ascii=False, indent=4)
# except Exception as ex:
#  print (ex)

# download apk in user_content/apk_data Directory
# docId = app_id
# download = api.download(docId, expansion_files=True)
# with open('user_content/apk_data/' + download['docId'] +  '.apk', 'wb') as first:
# 	for chunk in download.get('file').get('data'):
# 		first.write(chunk)

# for obb in download['additionalData']:
#     name = obb['type'] + '.' + str(obb['versionCode']) + '.' + download['docId'] + '.obb'
#     print(str(obb['versionCode']))
#     with open(name, 'wb') as second:
#         for chunk in obb.get('file').get('data'):
#             second.write(chunk)
# print('\nDownloading apk\n')
# docid = file_name
# download = api.download(docid, expansion_files=True)
# with open(download['docId'] + '.apk', 'wb') as first:
#     for chunk in download.get('file').get('data'):
#         first.write(chunk)
