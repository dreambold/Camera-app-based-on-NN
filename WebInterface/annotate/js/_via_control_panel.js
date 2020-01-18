/**
 *
 * @class
 * @classdesc VIA Control Panel
 * @author Abhishek Dutta <adutta@robots.ox.ac.uk>
 * @date 16 May 2019
 *
 */

var alexis_data='{"project":{"pid":"__VIA_PROJECT_ID__","rev":"__VIA_PROJECT_REV_ID__","rev_timestamp":"__VIA_PROJECT_REV_TIMESTAMP__","pname":"Unnamed VIA Project","creator":"VGG Image Annotator (http://www.robots.ox.ac.uk/~vgg/software/via)","created":1574343199772,"vid_list":["1"]},"config":{"file":{"loc_prefix":{"1":"","2":"","3":"","4":""}},"ui":{"file_content_align":"center","file_metadata_editor_visible":true,"spatial_metadata_editor_visible":true,"spatial_region_label_attribute_id":""}},"attribute":{"1":{"aname":"screws","anchor_id":"FILE1_Z0_XY1","type":3,"desc":"","options":{"0":"cyl","1":"hex","2":"sunk"},"default_option_id":""},"2":{"aname":"cables","anchor_id":"FILE1_Z0_XY1","type":3,"desc":"","options":{"0":"grey","1":"white","2":"black"},"default_option_id":""}},"file":{"1":{"fid":"1","fname":"Client_0000000001_Cam_0000000001_Pic_2019_11_10__14_42_15.png","type":2,"loc":2,"src":"https://inventocam.com/images/Client_0000000001_Cam_0000000001_Pic_2019_11_10__14_42_15.png"}},"metadata":{"1_yL69hM3y":{"vid":"1","flg":0,"z":[],"xy":[3,589.489,217.226,44.214],"av":{"1":"0"}},"1_iIESeUQH":{"vid":"1","flg":0,"z":[],"xy":[3,596.496,77.08,46.1],"av":{"1":"0"}},"1_qLcXrEX8":{"vid":"1","flg":0,"z":[],"xy":[8,1690.511,223.358,1588.905,68.321,1566.131,162.044,1595.912,122.628],"av":{"2":"0"}}},"view":{"1":{"fid_list":["1"]}}}';
 
function _via_control_panel(control_panel_container, via) {
  this._ID = '_via_control_panel_';
  this.c   = control_panel_container;
  this.via = via;

  // registers on_event(), emit_event(), ... methods from
  // _via_event to let this module listen and emit events
  _via_event.call( this );

  this._init();
}

_via_control_panel.prototype._init = function(type) {
  this.c.innerHTML = '';

  var logo_panel = document.createElement('div');
  logo_panel.setAttribute('class', 'logo');
  logo_panel.innerHTML = '<a href="http://www.robots.ox.ac.uk/~vgg/software/via/" title="VGG Image Annotator (VIA)" target="_blank">VIA</a>'
  this.c.appendChild(logo_panel);

  this.c.appendChild(this.via.vm.c);
  this._add_view_manager_tools();

  this._add_spacer();

  this._add_project_tools();

  this._add_spacer();

  this._add_region_shape_selector();

  this._add_spacer();

  var editor = _via_util_get_svg_button('micon_insertcomment', 'Show/Hide Attribute Editor');
  editor.addEventListener('click', function() {
    this.emit_event( 'editor_toggle', {});
  }.bind(this));
  this.c.appendChild(editor);

  this._add_spacer();

  this._add_project_share_tools();

  this._add_spacer();

  var keyboard = _via_util_get_svg_button('micon_keyboard', 'Keyboard Shortcuts');
  keyboard.addEventListener('click', function() {
    _via_util_page_show('page_keyboard_shortcut');
  }.bind(this));
  this.c.appendChild(keyboard);

  var help = _via_util_get_svg_button('micon_help', 'About VIA');
  help.addEventListener('click', function() {
    _via_util_page_show('page_about');
  }.bind(this));
  this.c.appendChild(help);
}

_via_control_panel.prototype._add_spacer = function() {
  var spacer = document.createElement('div');
  spacer.setAttribute('class', 'spacer');
  this.c.appendChild(spacer);
}

_via_control_panel.prototype._add_view_manager_tools = function() {
  var prev_view = _via_util_get_svg_button('micon_navigate_prev', 'Show Previous File', 'show_prev');
  prev_view.addEventListener('click', this.via.vm._on_prev_view.bind(this.via.vm));
  this.c.appendChild(prev_view);

  var next_view = _via_util_get_svg_button('micon_navigate_next', 'Show Next File', 'show_next');
  next_view.addEventListener('click', this.via.vm._on_next_view.bind(this.via.vm));
  this.c.appendChild(next_view);

  var add_media_local = _via_util_get_svg_button('micon_add_circle', 'Add Audio or Video File in Local Computer', 'add_media_local');
  add_media_local.addEventListener('click', this.via.vm._on_add_media_local.bind(this.via.vm));
  this.c.appendChild(add_media_local);

  var add_media_bulk = _via_util_get_svg_button('micon_lib_add', 'Bulk add file URI ( e.g. file:///... or http://... ) contained in a local CSV file where each row is a remote or local filename.', 'add_media_bulk');
  add_media_bulk.addEventListener('click', this.via.vm._on_add_media_bulk.bind(this.via.vm));
  add_media_bulk.addEventListener('click', function() {
    var action_map = {
      'via_page_fileuri_button_bulk_add':this._page_on_action_fileuri_bulk_add.bind(this),
    }
    _via_util_page_show('page_fileuri_bulk_add', action_map);
  }.bind(this));
  this.c.appendChild(add_media_bulk);

  var del_view = _via_util_get_svg_button('micon_remove_circle', 'Remove the Current File', 'remove_media');
  del_view.addEventListener('click', this.via.vm._on_del_view.bind(this.via.vm));
  this.c.appendChild(del_view);
}

_via_control_panel.prototype._add_region_shape_selector = function() {
  if ( document.getElementById('shape_point') === null ) {
    return;
  }

  var rect = _via_util_get_svg_button('shape_rectangle', 'Rectangle', 'RECTANGLE');
  rect.addEventListener('click', function() {
    this._set_region_shape('RECTANGLE');
  }.bind(this));
  this.c.appendChild(rect);

  var extreme_rect = _via_util_get_svg_button('shape_extreme_rectangle', 'Extreme rectangle is defined using four points along the boundary of a rectangular object.', 'EXTREME_RECTANGLE');
  extreme_rect.classList.add('shape_selector');
  extreme_rect.addEventListener('click', function() {
    this._set_region_shape('EXTREME_RECTANGLE');
  }.bind(this));
  this.c.appendChild(extreme_rect);

  var circle = _via_util_get_svg_button('shape_circle', 'Circle', 'CIRCLE');
  circle.addEventListener('click', function() {
    this._set_region_shape('CIRCLE');
  }.bind(this));
  this.c.appendChild(circle);

  var extreme_circle = _via_util_get_svg_button('shape_extreme_circle', 'Extreme circle is defined using any three points along the circumference of a circular object.', 'EXTREME_CIRCLE');
  extreme_circle.addEventListener('click', function() {
    this._set_region_shape('EXTREME_CIRCLE');
  }.bind(this));
  this.c.appendChild(extreme_circle);

  var ellipse = _via_util_get_svg_button('shape_ellipse', 'Ellipse', 'ELLIPSE');
  ellipse.addEventListener('click', function() {
    this._set_region_shape('ELLIPSE');
  }.bind(this));
  this.c.appendChild(ellipse);

  var line = _via_util_get_svg_button('shape_line', 'Line', 'LINE');
  line.addEventListener('click', function() {
    this._set_region_shape('LINE');
  }.bind(this));
  this.c.appendChild(line);

  var polygon = _via_util_get_svg_button('shape_polygon', 'Polygon', 'POLYGON');
  polygon.addEventListener('click', function() {
    this._set_region_shape('POLYGON');
  }.bind(this));
  this.c.appendChild(polygon);

  var polyline = _via_util_get_svg_button('shape_polyline', 'Polyline', 'POLYLINE');
  polyline.addEventListener('click', function() {
    this._set_region_shape('POLYLINE');
  }.bind(this));
  this.c.appendChild(polyline);

  var point = _via_util_get_svg_button('shape_point', 'Point', 'POINT');
  point.addEventListener('click', function() {
    this._set_region_shape('POINT');
  }.bind(this));
  this.c.appendChild(point);

  this.shape_selector_list = { 'POINT':point, 'RECTANGLE':rect, 'EXTREME_RECTANGLE':extreme_rect, 'CIRCLE':circle, 'EXTREME_CIRCLE':extreme_circle, 'ELLIPSE':ellipse, 'LINE':line, 'POLYGON':polygon, 'POLYLINE':polyline };
}

_via_control_panel.prototype._set_region_shape = function(shape) {
  this.emit_event( 'region_shape', {'shape':shape});
  for ( var si in this.shape_selector_list ) {
    if ( si === shape ) {
      this.shape_selector_list[si].classList.add('svg_button_selected');
    } else {
      this.shape_selector_list[si].classList.remove('svg_button_selected');
    }
  }
}

_via_control_panel.prototype._add_project_tools = function() {
  var load = _via_util_get_svg_button('micon_open', 'Open a VIA Project');
  load.addEventListener('click', function() {
    _via_util_file_select_local(_VIA_FILE_SELECT_TYPE.JSON, this._project_load_on_local_file_select.bind(this), false);
  }.bind(this));
  this.c.appendChild(load);

  var save = _via_util_get_svg_button('micon_save', 'Save current VIA Project');
  save.addEventListener('click', function() {
    this.via.d.project_save();
  }.bind(this));
  this.c.appendChild(save);

  var import_export_annotation = _via_util_get_svg_button('micon_import_export', 'Import or Export Annotations');
  //import_export_annotation.addEventListener('click', this._page_show_import_export.bind(this));
  console.log('what is this?');
  console.log(this);
  import_export_annotation.addEventListener('click', this._project_load_on_local_file_read(alexis_data));
  this.c.appendChild(import_export_annotation);
}

_via_control_panel.prototype._page_show_import_export = function(d) {
  var action_map = {
    'via_page_button_import':this._page_on_action_import.bind(this),
    'via_page_button_export':this._page_on_action_export.bind(this),
  }
  _via_util_page_show('page_import_export', action_map);
}

_via_control_panel.prototype._page_on_action_import = function(d) {
  if ( d._action_id === 'via_page_button_import' ) {
    if ( d.via_page_import_pid !== '' ) {
      this.via.s._project_pull(d.via_page_import_pid).then( function(remote_rev) {
        try {
          var project = JSON.parse(remote_rev);
          // clear remote project identifiers
          project.project.pid = _VIA_PROJECT_ID_MARKER;
          project.project.rev = _VIA_PROJECT_REV_ID_MARKER;
          project.project.rev_timestamp = _VIA_PROJECT_REV_TIMESTAMP_MARKER;
          this.via.d.project_load_json(project);
        }
        catch(e) {
          _via_util_msg_show('Malformed response from server: ' + e);
        }
      }.bind(this), function(err) {
        _via_util_msg_show(err + ': ' + d.via_page_import_pid);
      }.bind(this));
      return;
    }
    if ( d.via_page_import_via2_project_json.length === 1 ) {
      _via_util_load_text_file(d.via_page_import_via2_project_json[0],
                               this._project_import_via2_on_local_file_read.bind(this)
                              );
      return;
    }
    _via_util_msg_show('To import an existing shared project, you must enter its project-id.');
  }
}

_via_control_panel.prototype._page_on_action_export = function(d) {
  if ( d._action_id === 'via_page_button_export' ) {
    this.via.ie.export_to_file(d.via_page_export_format);
  }
}

_via_control_panel.prototype._project_load_on_local_file_select = function(e) {
  if ( e.target.files.length === 1 ) {
    _via_util_load_text_file(e.target.files[0], this._project_load_on_local_file_read.bind(this));
  }
}


_via_control_panel.prototype._project_load_on_local_file_read = function(project_data_str) {
  this.via.d.project_load(project_data_str);
  console.log("_project_load_on_local_file_read, project_data_str ");
  console.log(project_data_str);
}

_via_control_panel.prototype._project_import_via2_on_local_file_read = function(project_data_str) {
  this.via.d.project_import_via2_json(project_data_str);
}

_via_control_panel.prototype._add_project_share_tools = function() {
  if ( this.via.s ) {
    var imagebrowser = _via_util_get_svg_button('image_browser', 'Toggle Image Browser');
    imagebrowser.addEventListener('click', function() {
      this._show_imagebrowser();
    }.bind(this));
    var push = _via_util_get_svg_button('micon_upload', 'Push (i.e. share this project or share your updates made to this project)');
    push.addEventListener('click', function() {
      this.via.s.push();
    }.bind(this));

    var pull = _via_util_get_svg_button('micon_download', 'Pull (i.e. open a shared project or fetch updates for the current project)');
    pull.addEventListener('click', function() {
      this._share_show_pull();
    }.bind(this));

    this.c.appendChild(imagebrowser);
    //this.c.appendChild(push);
    //this.c.appendChild(pull);
  }
}

_via_control_panel.prototype._show_imagebrowser = function() {
    _via_util_page_show('image_browser');
    show_image_list();
}

_via_control_panel.prototype._share_show_pull = function() {
  if ( this.via.d.project_is_remote() ) {
    // check if remote project has newer version
    this.via.s._project_pull(this.via.d.store.project.pid).then( function(ok) {
      try {
        var d = JSON.parse(ok);
        if ( d.project.rev === this.via.d.store.project.rev ) {
          _via_util_msg_show('You already have the latest revision of this project');
          return;
        } else {
          this.via.d.project_merge_rev(d);
        }
      }
      catch(e) {
        _via_util_msg_show('Malformed response from server.');
        console.warn(e);
      }
    }.bind(this), function(err) {
      _via_util_msg_show('Failed to pull project.');
      console.warn(err);
    }.bind(this));
  } else {
    var action_map = {
      'via_page_button_open_shared':this._page_on_action_open_shared.bind(this),
    }
    _via_util_page_show('page_share_open_shared', action_map);
  }
}

_via_control_panel.prototype._page_on_action_open_shared = function(d) {
  if ( d._action_id === 'via_page_button_open_shared' ) {
    this.via.s.pull(d.via_page_input_pid);
  }
}

_via_control_panel.prototype._page_on_action_fileuri_bulk_add = function(d) {
  if ( d.via_page_fileuri_urilist.length ) {
    this.fileuri_bulk_add_from_url_list(d.via_page_fileuri_urilist);
  }

  if ( d.via_page_fileuri_importfile.length === 1 ) {
    switch( parseInt(d.via_page_fileuri_filetype) ) {
    case _VIA_FILE_TYPE.IMAGE:
      _via_util_load_text_file(d.via_page_fileuri_importfile[0], this.fileuri_bulk_add_image_from_file.bind(this));
      break;
    case _VIA_FILE_TYPE.AUDIO:
      _via_util_load_text_file(d.via_page_fileuri_importfile[0], this.fileuri_bulk_add_audio_from_file.bind(this));
      break;
    case _VIA_FILE_TYPE.VIDEO:
      _via_util_load_text_file(d.via_page_fileuri_importfile[0], this.fileuri_bulk_add_video_from_file.bind(this));
      break;
    default:
      _via_util_load_text_file(d.via_page_fileuri_importfile[0], this.fileuri_bulk_add_auto_from_file.bind(this));
    }

  }
}

_via_control_panel.prototype.fileuri_bulk_add_image_from_file = function(uri_list_str) {
  this.fileuri_bulk_add_from_url_list(uri_list_str, _VIA_FILE_TYPE.IMAGE);
}

_via_control_panel.prototype.fileuri_bulk_add_audio_from_file = function(uri_list_str) {
  this.fileuri_bulk_add_from_url_list(uri_list_str, _VIA_FILE_TYPE.AUDIO);
}

_via_control_panel.prototype.fileuri_bulk_add_video_from_file = function(uri_list_str) {
  this.fileuri_bulk_add_from_url_list(uri_list_str, _VIA_FILE_TYPE.VIDEO);
}

_via_control_panel.prototype.fileuri_bulk_add_auto_from_file = function(uri_list_str) {
  this.fileuri_bulk_add_from_url_list(uri_list_str, 0);
}

_via_control_panel.prototype.fileuri_bulk_add_from_url_list = function(uri_list_str, type) {
  var uri_list = uri_list_str.split('\n');
  if ( uri_list.length ) {
    var filelist = [];
    for ( var i = 0; i < uri_list.length; ++i ) {
      if ( uri_list[i] === '' ||
           uri_list[i] === ' ' ||
           uri_list[i] === '\n'
         ) {
        continue; // skip
      }
      var filetype;
      if ( type === 0 || typeof(type) === 'undefined' ) {
        filetype = _via_util_infer_file_type_from_filename(uri_list[i]);
      } else {
        filetype = type;
      }

      filelist.push({ 'fname':uri_list[i],
                      'type':filetype,
                      'loc':_via_util_infer_file_loc_from_filename(uri_list[i]),
                      'src':uri_list[i],
                    });
    }
    this.via.vm._file_add_from_filelist(filelist);
  }
}
