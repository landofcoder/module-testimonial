# magento2-testimonial
###### What is this extension about?
Show customer testimonial carousel, listing, allow customer submit testimonial to review the site

###### Install Extension
Download latest module file and upload it into folder ``app\code\Ves\Testimonial``
Then run commands:
```
php bin/magento module:enable Ves_Testimonial
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

```

###### manage testimonial extension
manage testimonial by navigation to ```Venustheme > Testimonial```

###### Setup Testimonial GraphQl
Download latest module file at [here](https://github.com/landofcoder/module-testimonial-graph-ql) and upload it into folder ``app/code/Ves/TestimonialGraphQl``
Then run commands:

```
php bin/magento module:enable Ves_TestimonialGraphQl
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy -f

```
