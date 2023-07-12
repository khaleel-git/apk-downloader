from re import T
import json
from textwrap import indent
from bs4 import BeautifulSoup
import random
import requests
import sys
from lxml import etree
import json
from pathlib import Path

appId = sys.argv[1]
mode  = sys.argv[2]

try:
    fresh_result = sys.argv[3] #yes
except Exception as ex:
    fresh_result = 'no'


def random_line(afile):
    lines = afile.readlines()
    return random.choice(lines)

afile = open("useragents.txt")

if (mode == 'search'):
    search_query = appId
    path_to_file = 'user_content/play_search/' + search_query + '.txt'
    path = Path(path_to_file)

    if (path.is_file() == True and fresh_result == 'no'):
        print(f'The file {path_to_file} exists')   
    else:
        url = 'https://play.google.com/store/search?q=' +  search_query + '&c=apps'
        print(f"Searching this url: {url} on Playstore")  
        headers = random_line(afile).rstrip()
        # print(headers)
        r  = requests.get(url, headers={'User-Agent': headers}, timeout = 100)
        # print(r)
        data = r.text
        # print(data)
        # data = data.encode(encoding = 'UTF-8', errors = 'strict')
        soup = BeautifulSoup(data,features="html.parser")
        dom = etree.HTML(str(soup))
        # Similar apps
        try:  
            scraped_links = dom.xpath("//a/@href")
            similar_apps = []
            for link in scraped_links:            
                appid = link.split('id=')
                if ('/store/apps/details?' in appid[0]):                                      
                    similar_apps = similar_apps + [appid[1]] 
                    # print(similar_apps)               
                    
            with open( 'user_content/play_search/' + search_query + '.txt', 'w', encoding='utf-8') as fd:
                for appid in similar_apps:
                    print(appid)
                    fd.write(appid)
                    fd.write("\n")

        except Exception as ex:
            print(ex)

if (mode == 'appId'):
    path_to_file = 'user_content/play_json/' + appId + '.json'
    path = Path(path_to_file)

    if (path.is_file() == True and fresh_result == 'no'):
        print(f'The file {path_to_file} exists \n-> Program exit ...')
        exit()

    url = 'https://play.google.com/store/apps/details?id=' + appId 
    print(url)

    headers = random_line(afile).rstrip()
    print(headers)

    r  = requests.get(url, headers={'User-Agent': headers}, timeout = 100)
    print(r)

    data = r.text

    # data = data.encode(encoding = 'UTF-8') chatgpt suggested to remove this line
    soup = BeautifulSoup(data,features="html.parser")
    dom = etree.HTML(str(soup))

try:
    # app icon
    try:
        icon = dom.xpath("(//img[@alt='Icon image'])[1]/@src")
        icon = icon [0]
        print(f"icon_url: {icon}")

    except Exception as ex:
        print(ex)

    try:
        title = dom.xpath("//h1/span/text()")
        title = title [0]
        print(f"App_title: {title}")

    except Exception as ex:
        print(ex)

    try:
        meta_description = dom.xpath("//meta[@name='description']//@content")
        meta_description = meta_description[0]
        # print(f"Meta Description is: {meta_description}")

    except Exception as ex:
        print(ex)

    try:
        str1 = ""
        full_description = dom.xpath('//meta[@itemprop="description"]/following::div[1]/text()')
        full_description = str1.join(full_description)
        # print(f"Full Description is: {full_description}")

    except Exception as ex:
        print(ex)


    try:
        rating= dom.xpath('//div[@itemprop="starRating"]/div/text()')
        rating = rating[0]
        print(f"Rating: {rating}")

    except Exception as ex: 
        print(ex)


    try: 
        num_of_downloads = dom.xpath('//div[@itemprop="starRating"]/following::div[3]/text()')
        num_of_downloads = num_of_downloads[0]
        print(f"Number of downloads: {num_of_downloads}")

    except Exception as ex:
        print(ex)

    try:
        json_content = {
            'appId':appId,
            'url':url,
            'icon': icon,
            'title': title,
            'rating': rating,
            'num_of_downloads': num_of_downloads,
            'meta_description': meta_description,
            'full_description': full_description
        }

        with open('user_content/play_json/' + appId + '.json', 'w') as fd:
            json.dump(json_content, fd, indent=4)
    except Exception as ex:
        print(ex)

except Exception as ex:
    print(ex)