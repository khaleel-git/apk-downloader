import sys
import time
from bs4 import BeautifulSoup
import requests
from pathlib import Path
import random
from urllib.request import urlopen
from urllib.parse import urlparse
# from urlparse import urljoin
from urllib.parse import parse_qsl, urljoin, urlparse
import re


apkpure_game_cat = ['game_action', 'game_adventure', 'game_arcade', 'game_board', 'game_card', 'game_casino', 'game_casual', 'game_educational', 'game_music', 'game_puzzle', 'game_racing', 'game_role_playing', 'game_simulation', 'game_sports', 'game_strategy', 'game_trivia', 'game_word']
apkpure_app_cat = ['art_and_design', 'auto_and_vehicles', 'beauty', 'books_and_reference', 'business', 'comics', 'communication', 'dating', 'education', 'entertainment', 'events', 'finance', 'food_and_drink', 'health_and_fitness', 'house_and_home', 'libraries_and_demo', 'lifestyle', 'maps_and_navigation', 'medical', 'music_and_audio', 'news_and_magazines', 'parenting', 'personalization', 'personalization', 'photography', 'productivity', 'shopping', 'social', 'sports', 'tools', 'travel_and_local', 'video_players', 'weather']

playstore_url_selector = 'body > div.main.page-q > div.left > div:nth-child(2) > div.additional > ul > li:nth-child(5) > p:nth-child(2) > a'
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

try:
    afile = open("useragents.txt")
    headers = random_line(afile).rstrip()

    links = open("Apps/demo.txt")
    line = links.get()
    print(line)

    link = "https://apkpure.com/call-of-duty®-mobile-garena/com.garena.game.codm"

    r  = requests.get(link, headers={'User-Agent': headers}, timeout = 50)
    print(r)
    data = r.text
    # print(data)
except Exception as ex:
    print(ex)


try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(playstore_url_selector)
    play_url = soup[0].get('href')
    print(f"Playstore url: \n{play_url}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(title_selector)
    soup = soup[0]
    title = soup.text
    print(title)
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(description_selector)
    description = soup[0].text
    print(f"Description: \n{description}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(what_new_selector)
    whats_new = soup[0].text
    print(f"Whats new: \n{whats_new}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(updated_selector)
    updated = soup[0].text
    print(f"Updated: \n{updated}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(latest_version_selector)
    version = soup[0].text
    print(f"Version: \n{version}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(requirements_selector)
    requirements = soup[0].text
    print(f"Requirements: \n{requirements}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(developer_selector)
    dev = soup[0].text
    print(f"Developer: \n{dev}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(apk_size_selector)
    size = soup[0].text
    print(f"Size: \n{size}\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(apk_type_selector)
    apk_type = soup[0].text

    if('XAPK' in apk_type):
        print("APK type: XAPK\n\n")
    else:
        print("APK type: apk\n\n")
except Exception as ex:
    print(ex)

try:
    soup = BeautifulSoup(data, features="lxml")
    soup = soup.select(avg_rating_selector)
    avg_rating = soup[0].text
    avg_rating_standard = (float(avg_rating))/2
    print(f"Avg Rating: \n{avg_rating_standard}\n")
except Exception as ex:
    print(ex)

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
