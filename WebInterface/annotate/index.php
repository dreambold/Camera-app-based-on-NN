<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="../config/favicon.svg" sizes="any">
    <link rel="icon" type="image/png" href="../config/favicon.png" sizes="96x96">
    <?php require_once('via_modules.php'); 	?>
    <title>VIA Image Annotator</title>
    <meta name="author" content="Abhishek Dutta">
    <meta name="description" content="VGG Image Annotator (VIA) is a standalone manual annotator software for image, audio and video. The full application is packaged as an offline html page of size < 400KB and runs solely from a web browser. More details are available at: http://www.robots.ox.ac.uk/~vgg/software/via/">
    <?php WriteCredits(); ?>
    <link rel="stylesheet" type="text/css" href="../config/via_image_annotator.css">
    <link rel="stylesheet" type="text/css" href="../config/style_imageloader.css">
  </head>

  <body onresize="via._hook_on_browser_resize()">

    <!-- Definition of VIA Assets (e.g. about page, info page, shorcut keys, etc.) -->

    
      <?php WriteIcons(); ?>
    

    <!-- VIA Information Pages -->
    <div id="via_page_container">
      <div data-pageid="page_import_export" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <h2>Export</h2>
        <ul>
          <li>Select Export Format:
            <select id="via_page_export_format">
              <option value="via3_csv">VIA3 (CSV)</option>
              <option value="temporal_segments_csv">Only Temporal Segments as CSV</option>
            </select>
          </li>
        </ul>
        <h2>Import</h2>
        <ul>
          <li>VIA Shared Project: <input id="via_page_import_pid" type="text" placeholder="e.g. 71578187-3cd3-45d0-8198-7c441fbc06af" style="width:25em;">
          </li>
          <li>VIA2 project created (json file):
            <input id="via_page_import_via2_project_json" type="file">
          </li>
        </ul>

        <div class="controls">
          <button id="via_page_button_import" onclick="_via_util_page_process_action(event)">Import</button>
          <button id="via_page_button_export" onclick="_via_util_page_process_action(event)">Export</button>
          <button onclick="_via_util_page_hide()">Cancel</button>
        </div>
      </div>

      <div data-pageid="page_fileuri_bulk_add" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <p>File Type:&nbsp;<select id="via_page_fileuri_filetype">
          <option value="2" selected>Image</option>
          <option value="4">Video</option>
          <option value="8">Audio</option>
          <option value="0">Detect Automatically</option>
          </select>
        </p>
        <h2>Paste File URI (one URI per line)</h2>
        <textarea id="via_page_fileuri_urilist" placeholder="For example, (1) http://www.robots.ox.ac.uk/~vgg/software/via/images/via_logo.png ; (2) file:///data/images/img001.jpg ; (3) file:///C:/Documents%20and%20Settings/tlm/video001.mp4" rows="10" cols="80"></textarea>
        <h2>Import URI from a File</h2>
        <input id="via_page_fileuri_importfile" type="file">

        <div class="controls">
          <button id="via_page_fileuri_button_bulk_add" onclick="_via_util_page_process_action(event)">Add</button>
          <button onclick="_via_util_page_hide()">Cancel</button>
        </div>
      </div>

      <div data-pageid="image_browser" class="via_page">
        <div class="toolbar">
        <span onclick="_via_util_page_hide()" class="text_button">&times;</span>
			<span class="image_browser_menu">
				<input type="checkbox" id="show_ignored_checkbox" class="image_browser_menu_item"><label class="image_browser_menu_label" for="show_ignored_checkbox">Show Ignored</label>
				<input type="checkbox" id="show_analyzed_checkbox" class="image_browser_menu_item"><label class="image_browser_menu_label" for="show_analyzed_checkbox">Show Analyzed</label>
				<input type="checkbox" id="show_to_annotate_checkbox" class="image_browser_menu_item" checked><label class="image_browser_menu_label" for="show_to_annotate_checkbox">Show to Annotate</label>
			</span>
			
        </div>
        <div id="image_list"></div>
        <div class="controls">
          <button onclick="_via_util_page_hide()">Close</button>
        </div>
      </div>

      <div data-pageid="page_share_already_shared" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <p style="color:red;">This feature is not stable yet. If you encounter any issues, please <a href="https://gitlab.com/vgg/via/issues">report</a> it.</p>
        <h3>Information about this shared project</h3>
        <p id="via_page_share_project_info"></p>
        <h3>How can others contribute to this project?</h3>
        <p>This project has already been shared and therefore anyone can contribute to this project. To contribute to this project, other users should to follow these steps:
          <ol>
            <li>Open the VIA application (version 3.0.3 or higher) in a web browser.</li>
            <li>Click <svg class="svg_icon" onclick="" viewbox="0 0 24 24"><use xlink:href="#micon_download"></use><title>Share this project and your updates with others</title></svg> button in the top toolbar.</li>
            <li>Enter the following project-id: <span id="via_page_share_project_id"></span></li>
            <li>Make changes to the project and click <svg class="svg_icon" viewbox="0 0 24 24"><use xlink:href="#micon_upload"></use></svg> to share your updates with others.</li>
          </ol>
        </p>
        <h3>Important Notes</h3>
        <ul>
          <li>Do not store private or confidential information in a shared VIA project. Furthermore, be careful when you share your project-id with others as it allows them to make any changes to your project.</li>
          <li>The VIA servers do not maintain backup copy of the shared VIA projects. In the event of disk failure, all data will be lost. So, we strongly advise you to always keep a local copy of your project data.</li>
          <li>We <strong>cannot guarantee</strong> 24/7 availability of VIA project share servers. In the event of hardware or disk failure, the VIA project share servers will be offline for an extended period of time.</li>
          <li>This VIA share feature should <strong>not</strong> be used for large scale collaborative annotation projects. For such use cases, we advise you to setup a dedicated server with sufficient backup and secutiry.</li>
          <li>The shared VIA project should not exceed 1MB in size.</li>
        </ul>
        <div class="controls">
          <button onclick="_via_util_page_hide()">Close</button>
        </div>
      </div>

      <div data-pageid="page_share_open_shared" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <h2>Open a Shared VIA Project</h2>
        <p>A unique project-id is assigned to every shared VIA project. For example, the following two project-id have been publicly shared for demonstration purposes:
          <ul>
            <li>Video Annotation: e302eadf-aa53-4a5a-b958-11175692c928</li>
            <li>Audio Annotation: d4a9bc87-9652-42c3-a336-f41e18d638e6</li>
          </ul>
        </p>
        <p>To open a shared project, enter the project-id below:</p>
        <table>
          <tr>
            <td><label for="via_page_input_pid">VIA Project Id</label></td>
            <td>
              <input style="width:25em;" type="text" placeholder="e.g. e302eadf-aa53-4a5a-b958-11175692c928" id="via_page_input_pid">
            </td>
          </tr>
        </table>

        <div class="controls">
          <button id="via_page_button_open_shared" onclick="_via_util_page_process_action(event)">Open Shared Project</button>
          <button onclick="_via_util_page_hide()">Cancel</button>
        </div>
      </div>

      <div data-pageid="page_demo_instructions" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <h1>Some Quick Tips</h1>
        <ul>
          <li>Click and drag mouse cursor to define a region around an object.</li>
          <li>Use the <span class="text_button" onclick="via.editor.show()">attribute editor</span> to define or update attributes (e.g. name, colour, etc) of user defined regions.</li>
        </ul>
      </div>

      <div data-pageid="page_keyboard_shortcut" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <h1>Keyboard Shortcuts</h1>
        <h3>General</h3>
        <table>
          <thead>
            <tr>
              <th>Command</th>
              <th>Shortcut</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Play/Pause Media</td><td><span class="key">Space</span></td></tr>
            <tr><td>Toggle Media Mute</td><td><span class="key">m</span></td></tr>
            <tr><td>Increase / Decrease Media Playback Speed</td><td><span class="key">+</span> / <span class="key">-</span></td></tr>
            <tr><td>Move Media Time Backward by 1, ..., 9 sec. (Ctrl to move forward)</td><td><span class="key">Ctrl</span> + <span class="key">1</span>, <span class="key">2</span>, ..., <span class="key">9</span</td></tr>
                                                                                                                                                                                                                <tr><td>Add Temporal Segment at Current Time</td><td><span class="key">a</span></td></tr>
            <tr><td>Update the edge (left or right) of last added segment to current time</td><td><span class="key">Shift</span> + <span class="key">a</span></td></tr>

            <tr><td>Select Previous / Next Temporal Group (e.g. Speaker)</td><td><span class="key">&uarr;</span> / <span class="key">&darr;</span></td></tr>

            <tr><td>Select [Previous] Next Temporal Segment (e.g. 3sec to 5sec)</td><td><span class="key">Shift</span> + <span class="key">Tab</span></td></tr>
            <tr><td>Select Temporal Segment at Current Time (if any)</td><td><span class="key">Enter</span></td></tr>

            <tr><td>Move to Previous / Next Video Frame</td><td><span class="key">l</span> / <span class="key">r</span></td></tr>
            <tr><td>Jump to Start/End of Video</td><td><span class="key">Shift</span> + <span class="key">s</span> / <span class="key">e</span></td></tr>
            <tr><td>Shift Visible Timeline by 1 sec.</td><td><span class="key">&larr;</span> / <span class="key">&rarr;</span></td></tr>
            <tr><td>Shift Visible Timeline by 60 sec.</td><td><span class="key">Shift</span> + <span class="key">&larr;</span> / <span class="key">&rarr;</span></td></tr>
            <tr><td>Zoom In/Out the Temporal Segment Timeline</td><td>Mouse Wheel<br/></td></tr>
            <tr><td>Pan the Temporal Segment Timeline Horizontally</td><td><span class="key">Shift</span> + Mouse Wheel</td></tr>
          </tbody>
        </table>
        <h3>When a Temporal Segment is Selected</h3>
        <table>
          <thead>
            <tr>
              <th>Command</th>
              <th>Shortcut</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Play/Pause Video Locked to Segment Boundary</td><td><span class="key">Spc</span></td></tr>
            <tr><td>Delete Selected Temporal Segment</td><td><span class="key">Backspace</span></td></tr>
            <tr><td>Select [Previous] Next Temporal Segment</td><td>[<span class="key">Shift</span>] + <span class="key">Tab</span></td></tr>
            <tr><td>Unselect Temporal Segment</td><td><span class="key">Esc</span></td></tr>
            <tr><td>Increase/Decrease the Extent of Left Edge (Ctrl updates by 1 sec.)</td><td>[<span class="key">Ctrl</span>] + <span class="key">l</span> / <span class="key">L</span></td></tr>
            <tr><td>Increase/Decrease the Extent of Right edge (Ctrl updates by 1 sec.)</td><td>[<span class="key">Ctrl</span>] + <span class="key">r</span> / <span class="key">R</span></td></tr>

            <tr><td>Jump to Start/End of Temporal Segment</td><td><span class="key">s</span> / <span class="key">e</span></td></tr>
            <tr><td>Move Selected Temporal Segment (Ctrl updates by 1 sec.)</td><td>[<span class="key">Ctrl</span>] + <span class="key">&larr;</span> / <span class="key">&rarr;</span></td></tr>
            <tr><td>Merge Selected Temporal Segment with the Segment on Left/Right</td><td><span class="key">Shift</span> + <span class="key">&larr;</span> / <span class="key">&rarr;</span></td></tr>
          </tbody>
        </table>

        <h3>Spatial Regions in an Image or a Video Frame</h3>
        <table>
          <thead>
            <tr>
              <th>Command</th>
              <th>Shortcut</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Select All Regions</td><td><span class="key">Ctrl</span> + a</td></tr>
            <tr><td>Delete Selected Regions</td><td><span class="key">Backspace</span> or <span class="key">Delete</span></td></tr>
          </tbody>
        </table>

        <p>&nbsp;</p>
      </div>

      <div data-pageid="page_about" class="via_page">
        <div class="toolbar"><span onclick="_via_util_page_hide()" class="text_button">&times;</span></div>
        <h2>VGG Image Annotator (VIA)</h2>
        <p>Version: <a href="https://gitlab.com/vgg/via/blob/master/CHANGELOG">__VIA_VERSION__</a></p>
        <p>VGG Image Annotator (VIA) is a simple and standalone manual annotation tool
          for image, audio and video. The VIA software is a light weight, standalone
          and offline software package that does not require any installation or setup
          and runs solely in a web browser. The complete VIA software fits in a single
          self-contained HTML page of size less than 500 kilobyte that runs as an
          offline application in most modern web browsers. VIA software is an open
          source project created solely using HTML, Javascript and CSS. More details
          about VIA is available from <a href="http://www.robots.ox.ac.uk/~vgg/software/via">http://www.robots.ox.ac.uk/~vgg/software/via</a>.</p>
        <h4>Open Source Ecosystem</h4>
        <p>We have nurtured a large and thriving open source community which not only
          provides feedback but also contributes code to add new features and improve
          existing features in the VIA software. The open source ecosystem of VIA
          thrives around its <a href="https://gitlab.com/vgg/via">source code repository</a>
          hosted by the Gitlab platform. Most of our users report issues and request
          new features for future releases using the
          <a href="https://gitlab.com/vgg/via/issues">issue portal</a>. Many of our
          users not only submit bug reports but also suggest a potential fix for
          these software issues. Some of our users also contribute code to add new
          features to the VIA software using the
          <a href="https://gitlab.com/vgg/via/merge_requests">merge request</a> portal.
          A list of our contributors is available
          <a href="https://gitlab.com/vgg/via/blob/master/Contributors.md">here</a>.</p>

        <p>Thanks to the flexibility provided by our BSD open source software
          <a href="https://gitlab.com/vgg/via/blob/master/LICENSE">license</a>, many
          industrial projects have adapted the VIA software for internal or commercial use.</p>

        <h4>License</h4>
        <pre>
Copyright (c) 2019, Abhishek Dutta, Visual Geometry Group, Oxford University and VIA Contributors.
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
        </pre>
        <p>Copyright &copy; 2019, <a href="mailto:adutta-removeme@robots.ox.ac.uk">Abhishek Dutta</a>, Visual Geometry Group, Oxford University and VIA Contributors.</p>
      </div>
    </div> <!-- end of page container -->

    <!-- used by _via_view_annotator._show_start_info() -->
    <div id="via_start_info_content" class="hide">
      <ul>
        <li>To start annotation of an image, audio and video, select <span class="text_button" onclick="via.vm._on_add_media_local()">TODO</span> or <span class="text_button" onclick="via.vm._on_add_media_remote()">TODO</span></li>
      </ul>
    </div>

    <!-- VIA dynamically populates this container with control panel, media (image, video, etc), etc. -->
    <div class="via_container" id="via_container"></div>
    <?php WriteJS(); ?>

    <!-- DEMO SCRIPT AUTOMATICALLY INSERTED BY VIA PACKER SCRIPT -->

    <script>
      //__ENABLED_BY_PACK_SCRIPT__var _VIA_DEBUG = false;
      var via_container = document.getElementById('via_container');
      var via = new _via(via_container);
      //__ENABLED_BY_DEMO_PACK_SCRIPT___via_util_page_show('page_demo_instructions');
    </script>
  </body>
</html>
