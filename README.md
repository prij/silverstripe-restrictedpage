# IPRestrictedPage
Simple Silverstripe module that allows pages to be viewable to certain IP addresses only.

## Installation
Install the module using Composer or by downloading and extracting itinto the project root folder. Run dev/build?flush=all.

The module extends Page and Page_Controller, so the option is available across all pages.

## Usage
Add IP addresses for each page in the _Allowed IP Addresses_ textfield under the **Settings** tab for that page. If valid IP addresses are entered in this field, the page will be viewable only by those visiting from the listing IP addresses.

To disable, clear the _Allowed IP Addresses_ field.