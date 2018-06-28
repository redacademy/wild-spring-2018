# RED Academy 2018 Community Project: Wild About Vancouver

## Authors:
M. Chang, P. Chong, K. Jeziorska, A. Toumeh

## Description:
- This responsively designed website is using Wordpress as a content management system and GULP as a task/build runner.  The designers' vision aims to highlight scenic views (through image carousels and hero-banners) that would inspire others to get outdoors.  A goal for revitalizing this webpage was to promote community involvement and participation in activities.  For this, we centered much of our functionality toward the Modern Tribe's Event Calendar Plugin and the Community Events Add-on Plugin. 

## Mobile and Desktop Views:

![Mobile View of Activity-Page](./screenshot3.jpg "Mobile View of Activity-Page")


 ![Desktop View of Event-Page](./screenshot2.jpg "Desktop View of Event-Page")

## Custom Plugin:
- A custom plugin was created for this website to maintain key functionality should users choose to migrate themes.  The plugin contains the php for custom-post-types and enqueue functions for scripts and styling.

## Third Party Plugins Utilized for this Project:
    - the Events Calendar by Modern Tribe
    - Community Events Add-on for the Events Calendar
    - Contact Form 7
    - Custom Field Suite

## Installation:

### 1. Download the project

Then add me to your `wp-content` directory.

### 2. Install the dev dependencies

Next you'll need to run `npm install` **inside your theme directory** next to install the node modules you'll need for Gulp, etc.

### 3. Update the proxy in `gulpfile.js`

Lastly, be sure to update your `gulpfile.js` with the appropriate URL for the Browsersync proxy (so change `localhost[:port-here]/[your-dir-name-here]` to the appropriate localhost URL).

## Moving Forward:
- Due to limitations in time, we were unable to complete all of our objectives.  For future developers, we recommend reading the 'Moving Forward' slide on our presentation at : https://docs.google.com/presentation/d/1zU4g7krlTcTCfM5RHH1dsSrf5lxl4GyOY1_ij2d87U8/edit?usp=sharing