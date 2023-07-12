import sys
import time
from bs4 import BeautifulSoup
from importlib_metadata import version
import requests
from pathlib import Path
import random
from urllib.request import urlopen
from urllib.parse import urlparse
# from urlparse import urljoin
from urllib.parse import parse_qsl, urljoin, urlparse
import re
import json
import os


apkpure_game_cat = ['game_action', 'game_adventure', 'game_arcade', 'game_board', 'game_card', 'game_casino', 'game_casual', 'game_educational', 'game_music', 'game_puzzle', 'game_racing', 'game_role_playing', 'game_simulation', 'game_sports', 'game_strategy', 'game_trivia', 'game_word']
apkpure_app_cat = ['art_and_design', 'auto_and_vehicles', 'beauty', 'books_and_reference', 'business', 'comics', 'communication', 'dating', 'education', 'entertainment', 'events', 'finance', 'food_and_drink', 'health_and_fitness', 'house_and_home', 'libraries_and_demo', 'lifestyle', 'maps_and_navigation', 'medical', 'music_and_audio', 'news_and_magazines', 'parenting', 'personalization', 'photography', 'productivity', 'shopping', 'social', 'sports', 'tools', 'travel_and_local', 'video_players', 'weather']

main_cat_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.title.bread-crumbs > a:nth-child(2)'
sub_cat_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.title.bread-crumbs > a:nth-child(3)'
playstore_url_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.additional > ul > li:nth-child(5) > p:nth-child(2) > a'
app_icon_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > dl > dt > div > img'
title_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > dl > dd > div.title-like > h1'
description_selector = '#describe > div > div'
what_new_selector = '#whatsnew > div:nth-child(3)'
tag_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.tag > div'
updated_selector = '#whatsnew > div:nth-child(2)'
latest_version_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.additional > ul > li:nth-child(2) > p:nth-child(2)'
requirements_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.additional > ul > li:nth-child(6) > p:nth-child(2)'
developer_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > dl > dd > div.details-author > p > a'
apk_size_selector = '#down_btns > div.div-box > a.da.no-right-radius > span > span'
apk_type_selector = '#down_btns > div.div-box > a.da.no-right-radius'
avg_rating_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > dl > dd > div.details-rating > div.rating-info > span.rating > span'
total_reviews_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > dl > dd > div.details-rating > div.rating-info > a:nth-child(3)'

css_selectors = [title_selector, description_selector, what_new_selector, tag_selector, updated_selector, latest_version_selector, requirements_selector, playstore_url_selector, developer_selector, apk_size_selector, avg_rating_selector, total_reviews_selector]
def random_line(afile):
    line = str(next(afile))
    for num, aline in enumerate(afile, 2):
        if random.randrange(num):
            continue
        line = aline
    return line

def unicodetoascii(ByteStr):
    finalByteString = (ByteStr.
    replace(b'\xe2\x84\xa2', b"").
    replace(b'\xe2\x80\x99', b"'").
    replace(b'\xc3\xa9', b'e').
    replace(b'\xe2\x80\x90', b'-').
    replace(b'\xe2\x80\x91', b'-').
    replace(b'\xe2\x80\x92', b'-').
    replace(b'\xe2\x80\x93', b'-').
    replace(b'\xe2\x80\x94', b'-').
    replace(b'\xe2\x80\x94', b'-').
    replace(b'\xe2\x80\x98', b"'").
    replace(b'\xe2\x80\x9b', b"'").
    replace(b'\xe2\x80\x9c', b'"').
    replace(b'\xe2\x80\x9c', b'"').
    replace(b'\xe2\x80\x9d', b'"').
    replace(b'\xe2\x80\x9e', b'"').
    replace(b'\xe2\x80\x9f', b'"').
    replace(b'\xe2\x80\xa6', b'...').
    replace(b'\xe2\x80\xb2', b"'").
    replace(b'\xe2\x80\xb3', b"'").
    replace(b'\xe2\x80\xb4', b"'").
    replace(b'\xe2\x80\xb5', b"'").
    replace(b'\xe2\x80\xb6', b"'").
    replace(b'\xe2\x80\xb7', b"'").
    replace(b'\xe2\x81\xba', b"+").
    replace(b'\xe2\x81\xbb', b"-").
    replace(b'\xe2\x81\xbc', b"=").
    replace(b'\xe2\x81\xbd', b"(").
    replace(b'\xe2\x81\xbe', b")"))
    
    return finalByteString

# there are two directories 
# (1) Apps
# (2 Games
# files = os.listdir("Apps")
# print(files)

for cat in apkpure_game_cat:
    print(" ")
    print(f"--------->{cat} .........")
    print(" ")

    file = 'games_' + cat + '_all_links.txt'
    # print(file)
    links_read = open("Games/" + file, "r")
    links = links_read.readlines()
    print(len(links))

    count = 0
    for link in links:
        
        try:
            print(count)
            afile = open("useragents.txt")
            headers = random_line(afile).rstrip()
            print(headers)

            link = link.rstrip()
            print(link)
            #get appids
            appId = link.split('/')
            appId = appId[-1]
            print(appId)

            # link = 'https://apkpure.com/mobile-legends/com.mobile.legends'
        except Exception as ex:
            print(ex)
        try:
            r  = requests.get(link, headers={'User-Agent': headers}, timeout = 50)
            print(r)
            data = r.text
            # print(data)
        except Exception as ex:
            print(ex)

        # main cat
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(main_cat_selector)
            main_cat = soup[0].text
            print(f"Main Cat: \n{main_cat}\n")
        except Exception as ex:
            print(ex)
            main_cat = ""
        
        # sub cat
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(sub_cat_selector)
            sub_cat = soup[0].text
            print(f"Sub Cat: \n{sub_cat}\n")
        except Exception as ex:
            print(ex)
            sub_cat = ""

        # PlayStore Url
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(playstore_url_selector)
            play_url = soup[0].get('href')
            print(f"Playstore url: \n{play_url}\n")
        except Exception as ex:
            print(ex)
            play_url = ""
        
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(app_icon_selector)
            app_icon = soup[0].get('srcset')
            app_icon = app_icon.split(' ')
            print(f"app_icon: \n{app_icon[0]}\n")
        except Exception as ex:
            print(ex)
            app_icon = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQ23GkWjn7fu0EGRaOEXhqENYMLH4PXvKwrw&usqp=CAU"

        # Title
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(title_selector)
            soup = soup[0]
            title = soup.text
            print(title)
        except Exception as ex:
            print(ex)
            title = ""

        # Whats new
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(what_new_selector)
            whats_new = soup[0].text
            print(f"Whats new: \n{whats_new}\n")
        except Exception as ex:
            print(ex)
            whats_new = ""
        
        # Updated
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(updated_selector)
            updated = soup[0].text
            print(f"Updated: \n{updated}\n")
        except Exception as ex:
            print(ex)
            updated = "Latest"

        # Version
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(latest_version_selector)
            version = soup[0].text
            print(f"Version: \n{version}\n")
        except Exception as ex:
            print(ex)
            version = ""

        # Requirements
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(requirements_selector)
            requirements = soup[0].text
            print(f"Requirements: \n{requirements}\n")
        except Exception as ex:
            print(ex)
            requirements = ""

        # Developer
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(developer_selector)
            dev = soup[0].text
            print(f"Developer: \n{dev}\n")
        except Exception as ex:
            print(ex)
            dev = ""
        
        # Size
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(apk_size_selector)
            size = soup[0].text
            print(f"Size: \n{size}\n")
        except Exception as ex:
            print(ex)
            size = ""

        # APK type
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(apk_type_selector)
            apk_type = soup[0].text

            if('XAPK' in apk_type):
                print("APK type: XAPK\n\n")
                apk_type = "XAPK"
            else:
                print("APK type: apk\n\n")
                apk_type = "APK"
        except Exception as ex:
            print(ex)
            apk_type = ""

        # Avg Rating
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(avg_rating_selector)
            avg_rating = soup[0].text
            avg_rating_standard = (float(avg_rating))/2
            print(f"Avg Rating: \n{avg_rating_standard}\n")
        except Exception as ex:
            print(ex)
            avg_rating_standard = ""

        # Total Reviews
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(total_reviews_selector)
            total_reviews = soup[0].text
            total_reviews = total_reviews.split(" ")
            total_reviews = total_reviews[0]

            if('k' in total_reviews):
                total_reviews = re.findall(r'\d+', total_reviews)
                total_reviews = total_reviews[0] + '000'
                print(f"Total Number of reviews: {total_reviews}\n")
            else:
                print(f"Total Number of reviews: {total_reviews}\n")
        except Exception as ex:
            print(ex)
            total_reviews = ""

        # short Description
        try:
            short_desc = "Download " + str(title) + " APK " + version + " for Android - updated app"
            # print(short_desc)

        except Exception as es:
            print(es)

        # Description
        try:
            soup = BeautifulSoup(data, features="lxml")
            soup = soup.select(description_selector)
            soup = soup[0]
            description = soup

            description = description.encode('utf-8')
            description = description.replace(b"<p><br/></p>", b"")
            description = description.replace(b'<div class="content" itemprop="description">', b'')
            description = description.replace(b'</div>', b'')

            description = unicodetoascii(description)

            # description = str(description)

            description = description.decode('utf-8')
            table_detail = "<table> <tr> <td>App ID</td> <td>" + appId + "</td> </tr> <tr> <td>Size</td> <td>" + size + "</td> </tr> <tr> <td>Version</td> <td>" + version + "</td> </tr> <tr> <td>Updated</td> <td>" + updated + "</td> </tr> <tr> <td>Developer</td> <td>" + dev + "</td> </tr> </table>"
            h2_title = "<h2>" + title + "</h2>"
            cat_list = '<h3>Apps in the Same Category: </h3> [catlist name="' + sub_cat +'"]'
            description = h2_title + table_detail + cat_list + description
            # print(description)
        except Exception as ex:
            print(ex)

        # Dictionary for storing all above info    
        content = {
            'main_cat': main_cat,
            'sub_cat': cat,
            'playstore_url': play_url,
            'app_icon': app_icon[0],
            'title':title,
            'short_description': short_desc,
            'description': description,
            'whats_new': whats_new,
            'updated': updated,
            'version':version,
            'requirements': requirements,
            'dev': dev,
            'size': size,
            'apk_type': apk_type,
            'rating': avg_rating_standard,
            'total_reviews': total_reviews
        }

        # print("############################## printing dictionary #######################")
        # print(content)
        try:
            with open("Games_content/" + appId + ".json", "w") as fd:
                json.dump(content, fd, indent=4)
            count = count + 1
        except Exception as ex:
            print(ex)
