# spark.blog
[blog.sheripark.com](http://blog.sheripark.com)
A wordpress blog for the website of Sheri Park.

## Build Commands
This theme was built off of the base theme Sage. Visit [roots.io/sage](https://roots.io/sage/docs/) for docoumentaton.

### Project Dependencies:
1. Node.js
2. gulp
3. Bower
4. BrowserSync
5. asset-builder
6. wiredep

#### Installing Dependencies
After installing Node.js, To install the project's dependencies you must run

```
npm install -g npm@latest
```

* Install gulp and Bower globally `npm install -g gulp bower`
* Install the rest of the npm dependencies with `npm install`
* Install Bower Dependencies `bower install`

#### Gulp Commands
* `gulp` - Compile and optimize the files in your assets directory
* `gulp watch` - Compile assets when file changes are made
* `gulp --production` - Compile assets for production (no source maps)

To use BrowserSync during `gulp watch` you need to update `devUrl` at the bottom of `assets/manifest.json` to reflect your local development hostname.

### Theme Stylesheets
The primary stylesheet `dist/styles/main.css` is built from `assets/styles/main.scss`.

### Theme Scripts
The primary javascript file `dist/scripts/main.js` is built from `assets/scripts/main.js`. Jquery and Modernizr are loaded before `main.js`.
