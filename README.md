#AgeGate by Torin Bond	
##An age gate plugin for Statamic CMS

AgeGate was designed for any site that requires the use of an age gate or really any kind of verification prior to accessing the main site.

###Installation

Installation is very easy.
1. copy the session_plugin folder into root _add-ons
2. copy age-gate.html into your theme's partial folder

###Usage

The age gate plugin works by checking for a cookie prior to loading any sort of layout content in your layout files. If nothing is found then we load the age gate form instead. 

Since every page is protected by the age gate the plugin returns the user to the original page they wanted to go to after successfully completing the form. 

Example in default.html layout
<pre><code> 
	{{ if {session_plugin:is_verified == true} }}   
   		<div class="outer-container">
   			{{ layout_content }}
   		</div>
   	{{ else }}
    	{{theme:partial src="age-gate"}}
  	{{ endif }}
</code></pre>

###Support and Feature Requests

Please if you have any questions or suggestions get at me on twitter [@katamari0611](https://twitter.com/katamari0611)