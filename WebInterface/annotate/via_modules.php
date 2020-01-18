<?php
function WriteJS(){
	echo '<script src="../config/jquery.min.js"></script>
    <script src="js/_via_util.js"></script>
    <script src="js/_via_const.js"></script>
    <script src="js/_via_config.js"></script>

    <script src="js/_via_event.js"></script>
    <script src="js/_via_control_panel.js"></script>
    <script src="js/_via_metadata.js"></script>
    <script src="js/_via_file.js"></script>
    <script src="js/_via_attribute.js"></script>
    <script src="js/_via_view.js"></script>
    <script src="js/_via_data.js"></script>
    <script src="js/_via_share.js"></script>
    <script src="js/_via_import_export.js"></script>

    <script src="js/_via_file_annotator.js"></script>
    <script src="js/_via_temporal_segmenter.js"></script>
    <script src="js/_via_view_annotator.js"></script>

    <script src="js/_via_view_manager.js"></script>

    <script src="js/_via_editor.js"></script>
    <script src="js/_via_debug_project.js"></script>
    <script src="js/_via.js"></script>
	<script src="js/backend_functions.js"></script>';
}
function WriteIcons(){
	echo '	<!--
        SVG icons
        Icons prefixed with "micon_" are downloaded from https://material.io/icons
      -->
      <svg style="display:none;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		  <defs>
			<symbol id="shape_rectangle">
			  <rect width="18" height="14" x="3" y="5" stroke="black" fill="none"></rect>
			</symbol>
			<symbol id="shape_extreme_rectangle">
			  <rect width="18" height="14" x="3" y="5" stroke="black" fill="none"></rect>
			  <circle r="2" cx="3"  cy="10" stroke="black" fill="grey"></circle>
			  <circle r="2" cx="10"  cy="19" stroke="black" fill="grey"></circle>
			  <circle r="2" cx="15" cy="5" stroke="black" fill="grey"></circle>
			  <circle r="2" cx="21" cy="14" stroke="black" fill="grey"></circle>
			</symbol>
			<symbol id="shape_circle">
			  <circle r="9" cx="12" cy="12" stroke="black" fill="none"></circle>
			</symbol>
			<symbol id="shape_extreme_circle">
			  <circle r="9" cx="12" cy="12" stroke="black" fill="none"></circle>
			  <circle r="2" cx="3" cy="10" stroke="black" fill="grey"></circle>
			  <circle r="2" cx="19" cy="6" stroke="black" fill="grey"></circle>
			  <circle r="2" cx="16" cy="20" stroke="black" fill="grey"></circle>
			</symbol>
			<symbol id="shape_ellipse">
			  <ellipse rx="10" ry="8" cx="12" cy="12" stroke="black" fill="none"></ellipse>
			</symbol>
			<symbol id="shape_point">
			  <circle r="3" cx="12" cy="12" stroke="black" fill="grey"></circle>
			</symbol>
			<symbol id="shape_polygon">
			  <path d="M 4 12 L 10 2 L 20 6 L 18 16 L 8 20 z" stroke="black" fill="none"></path>
			</symbol>
			<symbol id="shape_polyline">
			  <line x1="3" y1="4" x2="8" y2="18" stroke="black" fill="none"/>
			  <line x1="8" y1="18" x2="14" y2="6" stroke="black"/>
			  <line x1="14" y1="6" x2="20" y2="14" stroke="black"/>
			  <circle r="2" cx="3" cy="4" stroke="black"></circle>
			  <circle r="2" cx="8" cy="18" stroke="black"></circle>
			  <circle r="2" cx="14" cy="6" stroke="black"></circle>
			  <circle r="2" cx="20" cy="14" stroke="black"></circle>
			</symbol>
			<symbol id="image_browser">
				<path d="M0 0h24v24H0z" fill="none"/><path d="M22 16V4c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2zm-11-4l2.03 2.71L16 11l4 5H8l3-4zM2 6v14c0 1.1.9 2 2 2h14v-2H4V6H2z"/>
			</symbol>
			<symbol id="shape_line">
			  <line x1="6" y1="6" x2="19" y2="19" stroke="black"/>
			  <circle r="2" cx="6" cy="6" stroke="black"></circle>
			  <circle r="2" cx="19" cy="19" stroke="black"></circle>
			</symbol>
	
			<symbol id="micon_settings">
			  <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"></path>
			</symbol>
			<symbol id="micon_save">
			  <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"></path>
			</symbol>
			<symbol id="micon_open">
			  <path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 12H4V8h16v10z"></path>
			</symbol>
			<symbol id="micon_upload">
			  <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM14 13v4h-4v-4H7l5-5 5 5h-3z"/>
			</symbol>
			<symbol id="micon_download">
			  <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"/>
			</symbol>
			<symbol id="micon_zoomin">
			  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
			  <path d="M12 10h-2v2H9v-2H7V9h2V7h1v2h2v1z"/>
			</symbol>
			<symbol id="micon_zoomout">
			  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14zM7 9h5v1H7z"></path>
			</symbol>
			<symbol id="micon_delete">
			  <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
			</symbol>
			<symbol id="micon_copy">
			  <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"></path>
			</symbol>
			<symbol id="micon_paste">
			  <path d="M19 2h-4.18C14.4.84 13.3 0 12 0c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm7 18H5V4h2v3h10V4h2v16z"></path>
			</symbol>
			<symbol id="micon_insertcomment">
			  <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path>
			</symbol>
			<symbol id="micon_edit">
			  <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
			</symbol>
	
			<!-- File Manager -->
			<symbol id="micon_lib_add">
			  <path d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9h-4v4h-2v-4H9V9h4V5h2v4h4v2z"/>
			</symbol>
			<symbol id="micon_add_circle">
			  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
			</symbol>
			<symbol id="micon_remove_circle">
			  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm5 11H7v-2h10v2z"/>
			</symbol>
			<symbol id="micon_navigate_next">
			  <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
			</symbol>
			<symbol id="micon_navigate_prev">
			  <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
			</symbol>
			<symbol id="micon_search">
			  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
			</symbol>
			<!-- Import/Export -->
			<symbol id="micon_import">
			  <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"></path>
			</symbol>
			<symbol id="micon_export">
			  <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"></path>
			</symbol>
			<symbol id="micon_import_export">
			  <path d="M9 3L5 6.99h3V14h2V6.99h3L9 3zm7 14.01V10h-2v7.01h-3L15 21l4-3.99h-3z"/>
			</symbol>
	
			<!-- composed by Abhishek Dutta from existing materian icons, 31 Jan. 2019 -->
			<symbol id="micon_add_image">
			  <path d="M19 7v2.99s-1.99.01-2 0V7h-3s.01-1.99 0-2h3V2h2v3h3v2h-3z"/>
			  <path transform="translate(-9,-12) scale(1.8 1.8)" d="M5 19l3-4 2 3 3-4 4 5H5z"/>
			</symbol>
			<!-- composed by Abhishek Dutta from existing materian icons, 31 Jan. 2019 -->
			<symbol id="micon_add_media">
			  <path d="M19 7v2.99s-1.99.01-2 0V7h-3s.01-1.99 0-2h3V2h2v3h3v2h-3z"/>
			  <path transform="translate(-10,-7) scale(1.6 1.6)" d="M10 16.5l6-4.5-6-4.5v9z"/>
			</symbol>
			<!-- composed by Abhishek Dutta from existing materian icons, 31 Jan. 2019 -->
			<symbol id="micon_add_audio">
			  <path d="M19 7v2.99s-1.99.01-2 0V7h-3s.01-1.99 0-2h3V2h2v3h3v2h-3z"/>
			  <path transform="translate(-11,-4) scale(1.4 1.4)" d="M8 15c0-1.66 1.34-3 3-3 .35 0 .69.07 1 .18V6h5v2h-3v7.03c-.02 1.64-1.35 2.97-3 2.97-1.66 0-3-1.34-3-3z"/>
			</symbol>
			<!-- composed by Abhishek Dutta from existing materian icons, 13 May. 2019 -->
			<symbol id="micon_add_remote">
			  <path d="M4.5 11h-2V9H1v6h1.5v-2.5h2V15H6V9H4.5v2zm2.5-.5h1.5V15H10v-4.5h1.5V9H7v1.5zm5.5 0H14V15h1.5v-4.5H17V9h-4.5v1.5zm9-1.5H18v6h1.5v-2h2c.8 0 1.5-.7 1.5-1.5v-1c0-.8-.7-1.5-1.5-1.5zm0 2.5h-2v-1h2v1z"/>
			</symbol>
	
			<symbol id="micon_share">
			  <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/>
			</symbol>
			<!-- Video player controls -->
			<symbol id="micon_play">
			  <path d="M8 5v14l11-7z"/>
			</symbol>
			<symbol id="micon_pause">
			  <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
			</symbol>
			<symbol id="micon_mark_start">
			  <path d="M18.41 16.59L13.82 12l4.59-4.59L17 6l-6 6 6 6zM6 6h2v12H6z"/>
			</symbol>
			<symbol id="micon_mark_end">
			  <path d="M5.59 7.41L10.18 12l-4.59 4.59L7 18l6-6-6-6zM16 6h2v12h-2z"/>
			</symbol>
	
			<!-- Temporal Segments -->
			<symbol id="micon_add">
			  <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
			</symbol>
	
			<!-- Help -->
			<symbol id="micon_help">
			  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
			</symbol>
	
			<symbol id="micon_import_export">
			  <path d="M9 3L5 6.99h3V14h2V6.99h3L9 3zm7 14.01V10h-2v7.01h-3L15 21l4-3.99h-3z"/>
			</symbol>
	
			<!-- Restore -->
			<symbol id="micon_restore_load">
			  <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm-2 16c-2.05 0-3.81-1.24-4.58-3h1.71c.63.9 1.68 1.5 2.87 1.5 1.93 0 3.5-1.57 3.5-3.5S13.93 9.5 12 9.5c-1.35 0-2.52.78-3.1 1.9l1.6 1.6h-4V9l1.3 1.3C8.69 8.92 10.23 8 12 8c2.76 0 5 2.24 5 5s-2.24 5-5 5z"/>
			</symbol>
			<symbol id="micon_restore_save">
			  <path d="M19 12v7H5v-7H3v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-7h-2zm-6 .67l2.59-2.58L17 11.5l-5 5-5-5 1.41-1.41L11 12.67V3h2z"/>
			</symbol>
			<symbol id="micon_keyboard">
			  <path d="M20 5H4c-1.1 0-1.99.9-1.99 2L2 17c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-9 3h2v2h-2V8zm0 3h2v2h-2v-2zM8 8h2v2H8V8zm0 3h2v2H8v-2zm-1 2H5v-2h2v2zm0-3H5V8h2v2zm9 7H8v-2h8v2zm0-4h-2v-2h2v2zm0-3h-2V8h2v2zm3 3h-2v-2h2v2zm0-3h-2V8h2v2z"/>
			</symbol>
		  </defs>
		</svg>';
	}
function WriteCredits(){
	echo '<!--
        VGG Image Annotator (VIA)
        http://www.robots.ox.ac.uk/~vgg/software/via/

        Copyright (c) 2016-2019, Abhishek Dutta, Visual Geometry Group, Oxford University.
        All rights reserved.

        Redistribution and use in source and binary forms, with or without
        modification, are permitted provided that the following conditions are met:

        Redistributions of source code must retain the above copyright notice, this
        list of conditions and the following disclaimer.
        Redistributions in binary form must reproduce the above copyright notice,
        this list of conditions and the following disclaimer in the documentation
        and/or other materials provided with the distribution.
        THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
        AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
        IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
        ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
        LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
        CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
        SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
        INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
        CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
        ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
        POSSIBILITY OF SUCH DAMAGE.
      -->
      <!--
    Development of VIA is supported by the EPSRC programme grant
    Seebibyte: Visual Search for the Era of Big Data (EP/M013774/1).
    Using Google Analytics, we record the usage of this application.
    A summary of this data is used in reporting of this programme grant
    and research publications related to the VIA software.

    If you do not wish to share this data, you can safely remove the
    javascript code below.
      -->
    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                               m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                              })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');

      //__ENABLED_BY_PACK_SCRIPT__ga(\'create\', \'UA-20555581-2\', \'auto\');
      //__ENABLED_BY_PACK_SCRIPT__ga(\'set\', \'page\', \'/via/3.0.0/via_image_annotator.html\');
      //__ENABLED_BY_PACK_SCRIPT__ga(\'send\', \'pageview\');
    </script>';
}

?>