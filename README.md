# Sasher Plugin

**This README.md file should be modified to describe the features, installation, configuration, and general usage of the plugin.**

The **Sasher** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav). Creates a ribbon or sash across website pages for (e.g.) environments, messages

## Installation

Installing the Sasher plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation (Preferred)

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install sasher

This will install the Sasher plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/sasher`.

### Manual Installation

To install the plugin manually, download the zip-version of this repository and unzip it under `/your/site/grav/user/plugins`. Then rename the folder to `sasher`. You can find these files on [GitHub](https://github.com/hughbris/grav-plugin-sasher) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/sasher
	
> NOTE: This plugin is a modular component for Grav which may require other plugins to operate, please see its [blueprints.yaml-file on GitHub](https://github.com/hughbris/grav-plugin-sasher/blob/master/blueprints.yaml).

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/sasher/sasher.yaml` to `user/config/plugins/sasher.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml
enabled: true
```

Note that if you use the Admin Plugin, a file with your configuration named sasher.yaml will be saved in the `user/config/plugins/`-folder once the configuration is saved in the Admin.

### Style tweaks

You can override or supplement any styles in [the CSS provided](css/sash-ribbon.css):

* **in the theme** by creating a stylesheet file named `sasher-custom.css` in the `css` folder of your theme (so `user/themes/<themename>/css/sasher-custom.css`);
* **in the site config**  by providing a stylesheet named `custom.css` in `config/plugins/sasher` folder in your user folder (so `user/config/plugins/sasher/custom.css`).
* **for the environment** by supplying a stylesheet named `custom.css` in a `config/plugins/sasher` folder in your environment configuration folder (so `user/env/<env.domain>/config/plugins/sasher/custom.css`).

You can supply any or all of these stylesheets. If you specify style declarations of equivalent precedence in the environment CSS file, they will override any provided in config, the theme, or provided with the plugin, according to [CSS cascading rules](https://developer.mozilla.org/en-US/docs/Web/CSS/Cascade).

## Usage

**Describe how to use the plugin.**

## Credits

* https://codepen.io/nxworld/pen/oLdoWb
* https://github.com/aricooperdavis/grav-plugin-custom-banner

## To Do

- [x] Customise colours, opacity, position, border, other styles (b5b41f3)
- [ ] Provide a JS DOM injection option, I can't decide which is nicer :{
- [ ] Support exclude and include pages and intelligently pick a default state
- [ ] Something that's OK on mobile
- [ ] Fill out docs
- [ ] Create admin blueprints