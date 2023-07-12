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
file_name = sys.argv[1]
device_arg = sys.argv[2]

#pandas read csv files
df1 = pd.read_csv("gsfids_and_tokens_01.csv") #df1 specific functinality
df2 = pd.read_csv("gsfids_and_tokens_01.csv", index_col = 'device') #read a csv file and set index to column = Code_Name
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

# def getDevicesCodenames():
#     """Returns a list containing devices codenames"""
#     return api.sections()


# # LOGIN
# #####Authentication using gsf token#######
# mail = "hk.jigar@gmail.com"
# passwd = "vdoxbdmdbzelzyns"
# api = GooglePlayAPI(locale="en_US", timezone="Europe/Moscow", device_codename="gemini")
# api.login(email=mail, password=passwd)
# #print("My gfsId is: {}".format(api.gsfId))
# #print("My SubTokenId: {}".format(api.authSubToken))

# # gsf_id = 3521821418707576420
# # token ="BAjXX5H_ZVSOqcQbysp_ZBnOYRFfZS7_UlYKem61sT0LwJzq8H9upLgG3VuL0NOJ_a1-3A."
# # api.login(authSubToken=token, gsfId=gsf_id)
# ##########################################


print('\nDownloading apk\n')
docid = file_name
download = api.download(docid, expansion_files=True)
with open(download['docId'] + '.apk', 'wb') as first:
    for chunk in download.get('file').get('data'):
        first.write(chunk)

print('\nDownloading additional files\n')
for obb in download['additionalData']:
    name = obb['type'] + '.' + str(obb['versionCode']) + '.' + download['docId'] + '.obb'
    print(str(obb['versionCode']))
    with open(name, 'wb') as second:
        for chunk in obb.get('file').get('data'):
            second.write(chunk)
print('\nDownload successful\n')

# getDevicesCodenames()
