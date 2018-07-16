# Overview:
Ads system built with PHP Laravel, it will be with a functioning API and its documentation 


# Details

## Models:
- Category Model (Many-To-Many Relations with Banners - **up for discussion**)
- Banner Model (Many-To-Many Relations with Categories - **up for discussion**)
- User Model -> Morph Relation with Managers, Admins and Advertisers models
- Admin Model
- Manager Model
- Advertiser Model

## DB:
- Category: name_ar, name_en, is_visible
- Banner: category_id, title, link, sort, desc, image, is_featured, is_visible
- Banner-Category: banner_id, category_id (**up for discussion**)
- User: name, email, password, avatar, remeber_token, userable_id, userable_type, email_confirmed
- Admin: 
- Manager:
- Advertiser: