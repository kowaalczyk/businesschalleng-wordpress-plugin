# businesschalleng-wordpress-plugin
A wp-admin plugin for High School Business Challenge website.  

## Introduction
As a member of Students' Business Club at Warsaw School of Economics, design and maintenance of websites is my core responsibility. 
Being a working student, at the time preparing for exams, and learning PHP along the way, I made a lot of unnecessary mistakes - the website had to be moved from node.js server and angular.js theme (https://github.com/kowaalczyk/js-businesschallenge-website) to wordpress plugin ASAP, and it resulted in several crucial mistakes - in particular:  
- plugin relies on ACF and clever use of wordpress post categories for data validation, this does not allow visual preview until changes to post are saved
- extending page (with new pages that do not fit into any currently used category, or with new languages) is nearly impossible in current state of the plugin  
- theme structure is a little different from standard, in particular the `functions.php` which contains a lot of HTML template strings (copying stuff from previous template, this was the quickest solution I found at the time)
Though not perfect, this plugin served as an important lesson for me as a programmer - I learned a lot about CMS systems, web development in general, 
and most importantly, I now know that I will never want to work in PHP for a longer time.  


## Architecture and design of the plugin
Folder structure:  
`assets/` - contain static javascript and css  
`dev/` - basically junk  
`page-templates` - templates of all pages used in the theme  


#### Third-party scripts and CSS included to the template
  - materialize.css  
    - with materialize.js  
  - jQuery 3.2.1  


#### Page Fields Reference [NOT UPDATED FOR LATEST VERSION OF PLUGIN]

Current Edition Page Template [DONE]

- `jumbo_image` - URL
- `first_section_title` - Text
- `first_section_posts` - Relationship - HSBC Posts, multiple values, allowed null
- `second_section_title` - Text
- `second_section_posts` - Relationship - HSBC Posts, multiple values, allowed null
- `third_section_title` - Text
- `third_section_posts` - Relationship - HSBC Calendar Posts, multiple values, allowed null
- `fourth_section_title` - Text
- `fourth_section_posts` - Relationship - HSBC Posts, multiple values, allowed null

Edition Page Template [DONE]  
`edition_name` - text, unformatted
`jumbo_image` - image URL
`teams` - relationship, HSBC Team Posts
`partners` - relationship, HSBC Partner Posts

Contact Page Template [DONE]  
`text_heading` - text, unformatted
`text_main` - text, with HTML tags

Organizer Page Template [DONE]  
`jumbo_image` - image URL
`organizer_posts` - relationship, HSBC Partner Posts

Partner Page Template [DONE]  
`jumbo_image` - image URL
`partners_posts` - relationship, HSBC Partner Posts

Cases Page Template [DONE]  
`jumbo_image` - image URL
`first_section_title`  - text, unformatted
`first_section_posts` - relationship, HSBC Posts
`second_section_title` - text, unformatted
`second_section_post` - post object, HSBC Standard Post
`third_section_title` - text, unformatted
`third_section_post` - post object, HSBC Standard Post

Winners Page Template [DONE]  
`jumbo_image` - image URL
`winners_posts` - relationship, HSBC Team Posts


#### HSBC Components  

Components are a custom post category used within HSBC posts only.  
They DO NOT have their own templates, each component represents only a content that its parent HSBC post decides to display in a certain way.  

HSBC Text Component [DONE]  
`text_content` - text, unformatted. Used instead of `post_text`.

HSBC Button Component [DONE]  
`button_text` - text, unformatted. Used instead of `post_text`.
`link_to_file` - boolean
`file_url` - URL of the file, if `link_to_file`
`link_to_page` - boolean
`page_url` - URL of the page, if `link_to_page`
`link_url` - URL of the link, if not `link_to_file` and not `link_to_page`, not validated #TODO: Path validation

HSBC Team Member Component [DONE]  
`full_name` - text, unformatted
`about_the_member` - text, unformatted. Displayed only for winning team members.

HSBC Team Component [DONE]  
`team_name` - text, unformatted
`team_mentor` - text, unformatted
`team_description` - text, unformatted
`team_photo` - image URL
`team_members` - relationship, HSBC Team Member Components


#### HSBC Posts  

The code for rendering posts is placed under template-parts, files are named `hsbc_post-post_type`, and can be included in page template php code using  
`get_template_part("hsbc_post", "post_type")`.  


HSBC Standard post [DONE]  
`post_text` - text, unformatted
`add_side_image` - boolean
`image` - URL of the image, if `add_side_image`
`side_image_caption` - text, unformatted, if `add_side_image` #TODO: Add this field
`side_image_text` - text, unformatted, if `add_side_image` #TODO: Add this field
`add_more_paragraphs` - boolean
`more_paragraphs` - HSBC Text Components
`add_flashy_button` - boolean
`flashy_button` - post object, HSBC Button Component post
`add_normal_buttons` - boolean
`normal_buttons` - relationship, HSBC Button Component posts

HSBC List post [DONE]  
`post_text` - text, unformatted
`teams` - relationship, HSBC Team Components

HSBC External media post [DONE]  
`post_text` - text, unformatted
`external_media_content` - text, HTML converted into tags #TODO: Really test this

HSBC Calendar post [DONE]  
`post_text` - text, unformatted
`registration_logo` - text, HTML into tags  (SVG)
`registration_text` - text, unformatted
`registration_dates` - text, unformatted
`test_logo` - text, HTML into tags (SVG)
`test_text` - text, unformatted
`test_dates` - text, unformatted
`presentation_logo` - text, HTML into tags (SVG)
`presentation_text` - text, unformatted
`presentation_dates` - text, unformatted
`final_logo` - text, HTML into tags (SVG)
`final_text` - text, unformatted
`final_dates` - text, unformatted

Previous calendar post version:  
`event_name` - text, unformatted
`one_day_event` - boolean
`event_date` - date string `dd-mm-yy`, if `one_day_event`
`event_start_date` - date string `dd-mm-yy`, unless `one_day_event`
`event_end_date` - date string `dd-mm-yy`, unless `one_day_event`

HSBC Team post [DONE]  
`post_text` - text, unformatted
`display_style` - `winner`, `laureate` or `finalist` (checkbox)
`teams` - relationship, HSBC Team Components

HSBC Partner post [DONE]  
`partner_logo` - image URL
`partner_website` - URL, #TODO: validate
`partner_description` - text, unformatted
`partner_type` - text, unformatted

## License information  
Copyright (c) SKN Biznesu SGH, all rights reserved.  
