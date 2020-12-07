
# Roddick Custom Post by Roddick Osipov for Thrive Global


## Description
This plugin enables the user to create a custom post type ("Custom Roddick Post") within Wordpress. This custom post type allows the user to enter an associated metavalue which is stored for later use. The input field is found at the bottom of the the "Document" tab under "Roddick's Custom Metabox" section within the Gutenberg editor.

Finally, this plugin leverages the use of the Wordpress REST API and registers a custom endpoint route which will provide the user with a JSON encoded array of all of the metavalues for all Custom Roddick Posts. Once the plugin is installed, it can be reached at `https://[my.url]/wp-json/thrive_global/roddick_posts`

## Example call

```
roddick@Roddicks-MacBook-Pro ~ % curl -v http://wpfresh.local/wp-json/thrive_global/roddick_posts
*   Trying ::1...
* TCP_NODELAY set
* Connected to wpfresh.local (::1) port 80 (#0)
> GET /wp-json/thrive_global/roddick_posts HTTP/1.1
> Host: wpfresh.local
> User-Agent: curl/7.64.1
> Accept: */*
>
< HTTP/1.1 200 OK
< Server: nginx/1.16.0
< Date: Mon, 07 Dec 2020 18:54:51 GMT
< Content-Type: application/json; charset=UTF-8
< Transfer-Encoding: chunked
< Connection: keep-alive
< Vary: Accept-Encoding
< X-Powered-By: PHP/5.6.39
< X-Robots-Tag: noindex
< Link: <http://wpfresh.local/wp-json/>; rel="https://api.w.org/"
< X-Content-Type-Options: nosniff
< Access-Control-Expose-Headers: X-WP-Total, X-WP-TotalPages, Link
< Access-Control-Allow-Headers: Authorization, X-WP-Nonce, Content-Disposition, Content-MD5, Content-Type
< Allow: GET
< Vary: Origin
<
* Connection #0 to host wpfresh.local left intact
["hello_to_world","1234thrive6789", "<span>hmmm<\/span>"]* Closing connection 0
```


## Installation
Navigate to the "Releases" page of this repo. Download and extract the contents of the archive file to your `app/public/wp-content/plugins` directory. From the 'plugins' page within WP-admin, activate the plugin. 
