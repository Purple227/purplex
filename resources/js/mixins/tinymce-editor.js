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
import 'tinymce/plugins/lists';
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/autolink';
import 'tinymce/plugins/link';
import 'tinymce/plugins/image';
import 'tinymce/plugins/charmap';
import 'tinymce/plugins/print';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/hr';
import 'tinymce/plugins/anchor';
import 'tinymce/plugins/pagebreak';
import 'tinymce/plugins/spellchecker';
import 'tinymce/plugins/searchreplace';
import 'tinymce/plugins/wordcount';
import 'tinymce/plugins/visualblocks';
import 'tinymce/plugins/code';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/insertdatetime';
import 'tinymce/plugins/media';
import 'tinymce/plugins/nonbreaking';
import 'tinymce/plugins/save';
import 'tinymce/plugins/table';
import 'tinymce/plugins/template';
import 'tinymce/plugins/paste';
import 'tinymce/plugins/visualchars';
import 'tinymce/plugins/directionality';


export default {

	components: {
    'tinymce-editor': Editor // <- Important part
},

data() {

	return{
		initValue: {
			height: 300,
			plugins: [
			'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
			'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
			'save table directionality template paste'
			],
			toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
			//menubar: "tools"
			
			formats: {
				//'pre': { block: 'pre', styles: { 'overflow': 'auto'  } }
			},
			
		},
	}
},

}

