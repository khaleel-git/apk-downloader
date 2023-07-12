import sys
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager

from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait as wait
from selenium.webdriver.support import expected_conditions as EC


 
options = Options()
options.add_argument('--headless')
options.add_argument('--no-sandbox')
options.add_argument('--disable-dev-shm-usage')
driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)
# driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()))

 
# driver.get("https://python.org")
# print(driver.title)
# driver.close()

try:
    appId = sys.argv[1]
except Exception as ex:
    appId = 'com.apkinstaller.ApkInstaller'

try:
    scrape_str = sys.argv[2]
except Exception as ex:
    scrape_str = 'facebook'

try:
    source = sys.argv[3]
except Exception as ex:
    source = 'appId'


def random_line(afile):
    line = str(next(afile))
    for num, aline in enumerate(afile, 2):
        if random.randrange(num):
            continue
        line = aline
    return line

if (source == 'apr'):
    source = 'appId'

if (source == 'appId'):
    url = "https://apps.evozi.com/apk-downloader/?id=" + appId
    # print(url)

    driver.get(url)
   
    driver.find_element('xpath', '//*[@class="btn btn-lg btn-block btn-info mt-4 mb-4"]').click()

    wait(driver, 50).until(EC.visibility_of_element_located((By.XPATH, '//*[@class="btn btn-success btn-block mt-4 mb-4"]')))

    dl_link = driver.find_element('xpath', '//*[@class="btn btn-success btn-block mt-4 mb-4"]').get_attribute("href")
    
    print(dl_link)
    with open("scrape_dl/evozi/" + appId + ".txt", "w") as fd:
        fd.write(dl_link)
    
    # print(driver.title)
    driver.quit()

