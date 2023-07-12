import sys
from bs4 import BeautifulSoup

import requests
# from urllib.request import Request, urlopen

# req = Request('https://apk.support/download-app/com.king.candycrush4', headers={'User-Agent': 'Mozilla/5.0'})
# webpage = urlopen(req).read()


r  = requests.get('https://apk.support/download-app/com.king.candycrush4', headers={'User-Agent': 'Mozilla/5.0'})
data = r.text
soup = BeautifulSoup(data)

print(data)
print(soup)

css_selector = '#pageapp > div > div.downloading_tinfo > div.dinfo > div.fhelp > a'
get_dl_link_apkcombo = soup.select(css_selector)

dl_link = get_dl_link_apkcombo[0].get('href') + "&fp=1234"
print(dl_link)
resp = requests.get(dl_link)

print(resp.status_code) # print status code