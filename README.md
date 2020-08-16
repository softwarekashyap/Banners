# Magento 2 Banner Slider
![Alt text](header.png?raw=true "Magento2 Banner Slider")

---

![Alt text](Banner4.png?raw=true "Magento2 Banner Slider")


---

Banner Slider extension helps you to upload multiple images on the homepage as a slider. This banner slider is built with Owl Carousel Library, so all features of the owl are inherited on this extension. You can also call banner sliders on all pages using the code snippet. Banner Slider allows you to upload High Definition images of your highest selling, most popular or newly arrived products with a sorting order. 

With Banner Slider, you can also able to add or edit a custom link, title, target, description and/or images as per specific store using Magento 2's admin panel. Kashyap's Banner Slider will help you to easily target specific client or brand by showing to them on the inviting or important information on home and other pages.

## Installation without composer
* Download zip file of this extension
* Place all the files of the extension in your Magento 2 installation in the folder `app/code/Kashyap/Banners`
* Enable the extension: `php bin/magento --clear-static-content module:enable Kashyap_Banners`
* Upgrade db scheme: `php bin/magento setup:upgrade`
* Depl0y Static Content: `php bin/magento setup:static-content:deploy -f` Developer Mode
* Deploy Static Content: `php bin/magento setup:static-content:deploy` Production Mode

## Configuration
- Go to the `Stores -> Configurations -> Kashyap -> Kashyap Banner` where you can find various settings to configure the extension.

---

![Alt text](configuration.png?raw=true "Magento2 Banner Slider")

---

- if you want to call other pages using XML, Then copy and paste the code in your xml file.
`<block class="Kashyap\Banners\Block\Banners" name="ks.banners.slider.home" template="Kashyap_Banners::banners.phtml" />`

- if you want to call other pages staic block & CMS Pages, Then copy and paste the code in your Static blog and CMS Pages.
`{{block class="Kashyap\Banners\Block\Banners" template="Kashyap_Banners::banners.phtml"}}`

- if you want to call other pages using .phtl, Then copy and paste the code in your Static blog and CMS Pages.
`<?= $this->getLayout()->createBlock("Kashyap\Banners\Block\Banners")->setTemplate("Kashyap_Banners::banners.phtml")->toHtml(); ?>`

## Features
- Admin able to add to banner images:
	- Title
	- Description
	- Target
	- URL
- Admin able to set the sort order of the banner images.
- Admin able to enable/disable the feature.
- Admin able to control:
	- Loop
	- Next/Prev Buttons
	- Dots, Auto Play
	- Auto Play on Hover
	- Margin
	- Auto Play Speed
	- Auto Play Timeout
- Banner images are shown in an attractive banner with multiple configurations
- Banners can be added to any page of the website
- Multi-Store Supported

---

![Alt text](ManageBanners.png?raw=true "Magento2 Banner Slider")

---

![Alt text](YouTubeNewBanners.png?raw=true "Magento2 Banner Slider")

---

![Alt text](ImageNewBanners.png?raw=true "Magento2 Banner Slider")

---

![Alt text](EditYouTubeBanners.png?raw=true "Magento2 Banner Slider")

---

![Alt text](EditBanners.png?raw=true "Magento2 Banner Slider")

---

[![Alt text](https://www.kashyapsoftware.com/pub/media/logo/stores/1/ks_logo.png "kashyapsoftware.com")](https://www.kashyapsoftware.com/)
