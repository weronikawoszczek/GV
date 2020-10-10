# App HTML

## Installation
This Project required `node`, `npm` and `yarn`. If you do not have the installed please visit their pages and proceed with installation.
### First time installation
* Git clone project
* Run `npm install` - this should download the dependancies of the project
* Run `yarn` - this will install packages and yarn with update
* Run `gulp` - this will rebuild the HTML, CSS and JS files and also optimize and move IMG and assets to dist folder. This is also the default watch command so when making changes to assets they will automatically fire. 

## Important Notes
* All source html is in `/src` folder. All production html is generated in the `root` of the folder.
* All assets are derived from the `dist` folder. All source assets are in the `assets` folder.
* This website requires `jQuery`

## HTML
HTML is generated and partialized thanks to gulp-html-partials.
Source HTML is found in the `src\` folder. Please create and edit your html files ONLY there. Otherwise they will be overwritten by gulp and you will lose everything.

HTML partials are stored in `src\partials`, so this will be the place to find shared html like header or footer.
Manual launch: `gulp html`

## CSS
SCSS is the preprocessor, all source files are found in the `assets\css` folder.
Compliled files are located in the `dist\css` folder.
Manual launch: `gulp styles`

## JS
All source files are found in the `assets\js` folder. 3rd party libraries are stored int he `lib` folder.
Compliled files are located in the `dist\js` folder.
Manual launch: `gulp scripts`

## IMAGES
All source files are found in the `assets\img` folder.
Compliled files are located in the `dist\img` folder.
Manual launch: `gulp images`

## SVG
All svg icons are used inline.
If you need to see the source svg file, please check `assets/svg-source` folder