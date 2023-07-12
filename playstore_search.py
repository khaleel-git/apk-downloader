from re import T
from textwrap import indent
from bs4 import BeautifulSoup
import random
from numpy import short
import requests
import sys
from lxml import etree
import json


search_query = sys.argv[1]
# function 00 for picking a random useragent from a file
def random_line(afile):
    line = str(next(afile))
    for num, aline in enumerate(afile, 2):
        if random.randrange(num):
            continue
        line = aline
    return line

url = 'https://play.google.com/store/search?q=' +  search_query + '&c=apps'
print(url)

# getting a random user agent from a file of many useragents
afile = open("useragents.txt")
headers = random_line(afile).rstrip()
print(headers)

r  = requests.get(url, headers={'User-Agent': headers}, timeout = 100)
print(r)

data = r.text

# print(data)

data = data.encode(encoding = 'UTF-8', errors = 'strict')
# data = data.decode("utf-8") 
# print(data)
soup = BeautifulSoup(data,features="html.parser")
dom = etree.HTML(str(soup))

# app icon
try:
    # similar_apps = dom.xpath("((//span[contains(text(),'Similar apps')])[2]/following::div[1]/div/div/div/div/div/div/div/div/a)[1]/@href")
    similar_apps = dom.xpath("//a/@href")
    # print(f"Similar_apps: {similar_apps}")

    with open( search_query +".txt", 'w', encoding="utf-8") as fd:
        for link in similar_apps:
            fd.write(link)
            fd.write("\n")

except Exception as ex:
    print(ex)

# try:
#     # title = dom.xpath("//h1/span/text()")
#     title = dom.xpath("//a[@href='/store/apps/details?id=com.instagram.android']/@href")
#     print(f"App_title: {title[0]}")

# except Exception as ex:
#     print(ex)

# try:
#     meta_description = dom.xpath("//meta[@name='description']//@content")
#     meta_description = meta_description[0]
#     print(f"Meta Description is: {meta_description}")

# except Exception as ex:
#     print(ex)

# try:
#     str1 = ""
#     full_description = dom.xpath('//meta[@itemprop="description"]/following::div[1]/text()')
#     full_description = str1.join(full_description)
#     print(f"Full Description is: {full_description}")

# except Exception as ex:
#     print(ex)


# try:
#     rating= dom.xpath('//div[@itemprop="starRating"]/div/text()')
#     rating = rating[0]
#     print(f"Rating: {rating}")

# except Exception as ex: 
#     print(ex)


# try: 
#     num_of_downloads = dom.xpath('//div[@itemprop="starRating"]/following::div[3]/text()')
#     num_of_downloads = num_of_downloads[0]
#     print(f"Number of downloads: {num_of_downloads}")

# except Exception as ex:
#     print(ex)


# short_apk_json = {
#     'appId':appId,
#     'url':url,
#     'icon': icon,
#     'title': title,
#     'rating': rating,
#     'num_of_downloads': num_of_downloads,
#     'meta_description': meta_description,
#     'full_description': full_description
# }

# # print(short_apk_json)

# with open("user_content/short_apk_json/" + appId + ".json", 'w') as fd:
#     json.dump(short_apk_json, fd, indent=4)