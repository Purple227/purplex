// Import TinyMCE
import Editor from '@tinymce/tinymce-vue';
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/silver';

// Skins
import "../../../public/css/tinymce/skin/ui/oxide/skin.min.css";
import "../../../public/css/tinymce/skin/ui/oxide/content.min.css";
import "../../../public/css/tinymce/skin/content/default/content.min.css";

//plugins
import 'tinymce/plugins/advlist';

export default {

	components: {
    'tinymce-editor': Editor // <- Important part
},

data() {

	return{
			initValue: {
				//
			},
		}
	},

}

