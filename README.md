# RestrictedPage
Simple Silverstripe module that allows pages to be viewable to certain IP addresses only.

## Installation
Install the module by copying the folder into the project root folder and run dev/build?flush=all.
The module decorates Page and Page_Controller.

## Usage
Add IP addresses for each page in the _Allowed IP Addresses_ textfield under the **Settings** tab for that page. If valid IP addresses are entered in this field, the page will be viewable only by those visiting from the listing IP addresses.

To disable, clear the _Allowed IP Addresses_ field.