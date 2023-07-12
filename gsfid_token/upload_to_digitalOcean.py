import os
import boto3
import sys
from boto3.session import Session
from io import BytesIO




file_name = sys.argv[1]
app_ver = sys.argv[2]
target_device = sys.argv[3]
session = boto3.session.Session()

client = session.client('s3',
                        region_name='sfo3',
                        endpoint_url='https://sfo3.digitaloceanspaces.com',
                        aws_access_key_id='KVWYPBVNGFL3NGVDQ3IO',
                        aws_secret_access_key='oXent+78kyVROO59dLEextq4z20OEz0ppK0s9dOPKMM')

# s3 = boto3.resource('s3')
# bucket = s3.Bucket('my-bucket')
# key = 'dootdoot.jpg'
# objs = list(bucket.objects.filter(Prefix=key))
# if any([w.key == path_s3 for w in objs]):
#     print("Exists!")
# else:
#     print("Doesn't exist")

client.upload_file(
    '/home/apkfuel/public_html/apk-downloader/gsfid_token/user_content/apk_data/'+ file_name + '.apk', 'play.savegoogle.com', 'apks/'+file_name + '_CodeName='+ target_device + '_App_Version=' + app_ver +'.apk',
    ExtraArgs={'ACL': 'public-read'}
)

