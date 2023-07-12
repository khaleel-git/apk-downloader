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
file_name = sys.argv[1]
device_arg = sys.argv[2]

#pandas read csv files
df1 = pd.read_csv("gsfids_and_tokens_5.csv") #df1 specific functinality
df2 = pd.read_csv("gsfids_and_tokens_5.csv", index_col = 'device') #read a csv file and set index to column = Code_Name
# df3 = pd.read_csv("gsfids_and_tokens.csv")
devices = df1['device'].values  # as a numpy array

device = df2.loc[device_arg, : ]
print(device.gsfid)
print(device.sub_auth_token)
print(device.TimeZone)

#now login
api = GooglePlayAPI("en_US", timezone = device.TimeZone, device_codename = device_arg)
api.login(authSubToken = device.sub_auth_token, gsfId = device.gsfid)
# api.login( email = device.Email, password = device.App_Password)

#file_name = "de.mobileconcepts.cyberghost"
# SEARCH
#print("\nSearch suggestion for \"fir\"\n")
#print(api.searchSuggest("face"))

result = api.search(file_name)
appIds_array = []
for doc in result:
    if 'docid' in doc:
        print("doc: {}".format(doc["docid"]))
        appIds_array.append(doc['docid'])
    for cluster in doc["child"]:
        print("\tcluster: {}".format(cluster["docid"]))
        for dapp in cluster["child"]:
            print("\t\tapp: {}".format(dapp["docid"]))
            appIds_array.append(dapp['docid'])

appIds_len = len(appIds_array)   
#print(appIds_array)  

with open("user_content/apk_search/" + file_name + '.txt', 'w') as f:
	for i in range(appIds_len):
		f.write(appIds_array[i] + "\n")


for i in range(appIds_len):
    result = app(
    appIds_array[i],
    lang='en', # defaults to 'en'
    country='us' # defaults to 'us'
    )
    with open("user_content/apk_json/" + appIds_array[i] + '.json', 'w', encoding='utf-8') as f:
        json.dump(result, f, ensure_ascii=False, indent=4)
    # docId = appIds_array[i]
    # download = api.download(docId, expansion_files=True)
    # with open('user_content/apk_data/' + download['docId'] + '.apk', 'wb') as first:
    #  for chunk in download.get('file').get('data'):
    #   first.write(chunk)

# #for i in range(appIds_len):
# docId = appIds_array[i]
# download = api.download(docId, expansion_files=True)
# with open('user_content/apk_data/' + download['docId'] + '.apk', 'wb') as first:
#     for chunk in download.get('file').get('data'):
#         first.write(chunk)
