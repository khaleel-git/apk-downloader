import requests
import random
import time
import os
# function 02 to download apk from external sites
def random_line(afile):
    line = str(next(afile))
    for num, aline in enumerate(afile, 2):
        if random.randrange(num):
            continue
        line = aline
    return line

def download_file(url,headers):
    # local_filename = url.split('/')[-1]
    local_filename = "dump.txt"
    # NOTE the stream=True parameter below
    with requests.get(url, stream=True, headers={'User-Agent': headers}, timeout = 100) as r:
        r.raise_for_status()
        with open(local_filename, 'wb') as f:
            for chunk in r.iter_content(chunk_size=8192):
                # If you have chunk encoded response uncomment if
                # and set chunk_size parameter to None.
                #if chunk:
                f.write(chunk)
    return local_filename

path = "/home/apkfuel/public_html/apk-downloader/scrape_sites/apkpure.com/Games_content/"
url = "https://apkfuel.com/apk-downloader/scrape_sites/apkpure.com/start_posting/games/start.php"

count = 0
while True:
    count = count + 1
    afile = open("useragents.txt")
    headers = random_line(afile).rstrip()

    print(f"----> Publishing {count}th post!")
    print(" ")

    try:
        status = download_file(url, headers)
        print(status)

        if(count >= 10):
            count = 0
            print("")
            print("###########################################")
            print(f"Now Sleeping for 3.2 minutes ..... ")
            for i in range(0,200):
                print(f"{i} seconds spent on sleep .....")
                time.sleep(1)

        if any(os.scandir(path)):
            print('not empty')
            time.sleep(30)
        else:
            print("Directory is empty, exiting ....")
            break
    except Exception as ex:
        print(ex)
