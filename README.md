# magento2-testimonial
###### What is this extension about?
Show customer testimonial carousel, listing, allow customer submit testimonial to review the site

###### Install Extension
```
composer require landofcoder/module-testimonial
php bin/magento module:enable Ves_Testimonial
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

```

###### manage testimonial extension
manage testimonial by navigation to ```Venustheme > Testimonial```

###### Setup Testimonial GraphQl
```
landofcoder/module-testimonial-graph-ql
php bin/magento module:enable Ves_TestimonialGraphQl
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

```
