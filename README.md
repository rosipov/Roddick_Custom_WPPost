
# Roddick Custom Post by Roddick Osipov for Thrive Global


## Description
This plugin enables the user to create a custom post type ("Custom Roddick Post") within Wordpress. After installation it can be found in the left hand menu within wp-admin. This custom post type allows the user to enter an associated metavalue which is stored for later use. The input field for this metavalue can be found at the bottom of the "Document" tab under the "Roddick's Custom Metabox" section within the Gutenberg editor.

Finally, this plugin leverages the use of the Wordpress REST API and registers a custom endpoint route which will provide the user with a JSON encoded array of all of the metavalues for all Custom Roddick Posts. Once the plugin is installed, it can be reached at `https://[my.url]/wp-json/thrive_global/roddick_posts`

## Example call

```
roddick@Roddicks-MacBook-Pro ~ % curl http://wpfresh.local/wp-json/thrive_global/roddick_posts
["hello_to_world","1234thrive6789", "<span>hmmm<\/span>"]
```

## Installation
Navigate to the "Releases" page of this repo. Download and extract the contents of the archive file to your `app/public/wp-content/plugins` directory. From the 'plugins' page within WP-admin, activate the plugin. 
