# Overview:
Ads system built with PHP Laravel, it will be with a functioning API and its documentation 


# Details

### Models:
- [x] Category Model (Many-To-Many Relations with Banners - **up for discussion**)
- [x] Banner Model (Many-To-Many Relations with Categories - **up for discussion**)
- [x] User Model -> Morph Relation with Managers, Admins and Advertisers models
- [x] Admin Model
- [x] Manager Model
- [x] Advertiser Model

### DB:
- [x] Category: name_ar, name_en, is_visible
- [x] Banner: category_id, title, link, sort, desc, image, is_featured, is_visible
- [ ] Banner-Category: banner_id, category_id (**up for discussion**)
- [x] User: name, email, password, avatar, remeber_token, userable_id, userable_type, email_confirmed
- [ ] Admin: 
- [ ] Manager:
- [ ] Advertiser:

### API Routes:
APIs Endpoint `/api/v1`

| Method                  | URL                  		 | Headers                  | Comments                  				|
| ----------------------- | ---------------------------- | ------------------------ | ----------------------------------------- |
|                         | ``	 	 					 | 		 					| 											|