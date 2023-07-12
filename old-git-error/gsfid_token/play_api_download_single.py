# This script wait for web to populate.
from gpapi.googleplay import GooglePlayAPI
import os
import sys

api = GooglePlayAPI(locale="en_US", timezone="Europe/Berlin", device_codename="oneplus3")
#api.login(email=mail, password=passwd)
#print("My gfsId is: {}".format(api.gsfId))
#print("My SubTokenId: {}".format(api.authSubToken))



gsf_id = 4085776409492435183
token ="BQjXX8y7HTQ_bwvGmnPTzaD5SunPqttU-Evyl21jKbZ5a2LnJpZaboZt_GiLbohmiI-Uuw."
api.login(authSubToken=token, gsfId=gsf_id)
##########################################


file_name = sys.argv[1]
    
#download apk in user_content/apk_data Directory
docId = file_name
download = api.download(docId, expansion_files=True)
with open('user_content/apk_data/' + download['docId'] + '.apk', 'wb') as first:
	for chunk in download.get('file').get('data'):
		first.write(chunk)
