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
css_selector = '#pagedata'
base_url = 'https://apkpure.com'

def random_line(afile):
    line = str(next(afile))
    for num, aline in enumerate(afile, 2):
        if random.randrange(num):
            continue
        line = aline
    return line

def getWordsFromURL(url):
    return re.compile(r'[\:/?=\-&]+',re.UNICODE).split(url)

def scrape_all_links(count, cat_mode, cat):
    # getting a random user agent from a file of many useragents
    # afile = open("useragents.txt")
    # headers = random_line(afile).rstrip()
    # print(headers)

    url_apkpure = 'https://apkpure.com/' + cat + '/?page='

    try:
        afile = open("useragents.txt")
        headers = random_line(afile).rstrip()

        r  = requests.get(url_apkpure + str(count), headers={'User-Agent': headers}, timeout = 50)
        print(r)
        data = r.text
        # print(data)
        
        soup = BeautifulSoup(data, features="lxml")
        soup = soup.select(css_selector)
        # print(soup)
        soup = soup[0]

        # print(soup)
        #Find all links
        print("\n\n##############################")
        print(f"All links in [category = {cat}] & clster # {count}")
        print("##############################\n")
        
        links = soup.find_all('a')
        # print(links)
        # links = set(links[0])
        link_list = []
        for link in links:
            link = link.get('href')

            words = getWordsFromURL(link)
            # print(words)

            if "download" not in words: 
                link_list.append(urljoin(base_url,link))
    except Exception as ex:
        print("\n##### Error Occured! #######\nError is: ")
        print(ex)
        time.sleep(3)
    
    try:
        print(f"Total links including duplicates in the cluster are: {len(link_list)}")
        # print(link_list)

        u_links = set(link_list)
        print(f"Total links after removing duplicates in the cluster are: {len(u_links)} \n")

        if(cat_mode == 'App'):
            for i in u_links:
                print(i)
                with open("apps_" + cat + "_all_links.txt", "a") as fd:
                    fd.write(i + "\n")
        else:
            for i in u_links:
                print(i)
                with open("games_" + cat + "_all_links.txt", "a") as fd:
                    fd.write(i + "\n")

    except Exception as ex:
        print("\n##### Error Occured! #######\nError is: ")
        print(ex)
        time.sleep(3)
        
    try:
        if links:
            count = count + 1
            scrape_all_links(count, cat_mode, cat)
    
    except Exception as ex:
        print("\n##### Error Occured! #######\nError is: ")
        print(ex)
        time.sleep(3)

# for app_cat in apkpure_app_cat:
#     total_links_app_cat = 0
#     cat_mod = 'App'
#     count = 1

#     with open("save_position_app_cat.txt", "w") as fd:
#         fd.write(app_cat)
    
#     f = open("save_position_app_cat.txt", "r")
#     current_save_position_app_cat = f.read()

#     if(app_cat != current_save_position_app_cat):
#         continue


#     scrape_all_links(count,cat_mod, app_cat)


for game_cat in apkpure_game_cat:
    total_links_app_cat = 0
    cat_mod = 'Game'
    count = 1

    with open("save_position_game_cat.txt", "w") as fd:
        fd.write(game_cat)
    
    f = open("save_position_game_cat.txt", "r")
    current_save_position_game_cat = f.read()

    if(game_cat != current_save_position_game_cat):
        continue


    scrape_all_links(count,cat_mod, game_cat)