<?php namespace App\Http\Controllers;

use App\Cargo;
use App\Cidade;
use App\Empresas;
use App\Funcionarios;
use App\Status;
use Session;
	use Request;
	use DB;
	use CRUDBooster;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\View\View;

class AdminFuncionariosController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "funcionarios";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nome","name"=>"nome"];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Endereco","name"=>"endereco"];
			$this->col[] = ["label"=>"Cargo","name"=>"id_cargo", "join" => "cargos,cargo"];
			$this->col[] = ["label"=>"Idade","name"=>"idade"];
			$this->col[] = ["label"=>"Nascimento","name"=>"nascimento"];
			$this->col[] = ["label"=>"Salario","name"=>"salario","callback_php"=>'number_format($row->salario)'];
			$this->col[] = ["label"=>"Observacao","name"=>"observacao"];
			$this->col[] = ["label"=>"Empresa","name"=>"id_empresa","join"=>"empresas,nome"];
			$this->col[] = ["label"=>"Cidade","name"=>"id_cidade","join"=>"cidades,cidade"];
			$this->col[] = ["label"=>"Status","name"=>"id_status", "join" => "status,status"];
			

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nome','name'=>'nome','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:funcionarios','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
			$this->form[] = ['label'=>'Endereco','name'=>'endereco','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Empresa','type'=>'select2','name'=>'id_empresa','datatable'=>'empresas,nome', "validation" => 'required'];
			$this->form[] = ['label'=>'Cargo','type'=>'select','name'=>'id_cargo', 'validation' => 'required','datatable'=>'cargos,cargo'];
			$this->form[] = ['label'=>'Idade','name'=>'idade','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-2'];
			$this->form[] = ['label'=>'Nascimento','name'=>'nascimento','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Salario','name'=>'salario','type'=>'number', 'validation' => 'required','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Status','type'=>'select','name'=>'id_status', 'datatable'=>'status,status', 'width' => 'col-sm-4'];
			$this->form[] = ['label'=>'Observação','name'=>'observacao','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Funcionario','type'=>'select2','name'=>'id','datatable'=>'funcionarios,nome'];
			//	 CHECKBOX $this->form[] = ['label'=>'Cidade','name'=>'id_cidade','type'=>'checkbox','datatable'=>'cidades,cidade'];
			$this->form[] = ['label'=>'Cidade','name'=>'id_cidade','type'=>'radio','datatable'=>'cidades,cidade'];
			// DATAMODEL $this->form[] = ['label'=>'Funcionarios','name'=>'nome','type'=>'datamodal','datamodal_table'=>'funcionarios','datamodal_where'=>'','datamodal_columns'=>'nome,email,salario','datamodal_columns_alias'=>'Nome,Email,Salario'];	
			$this->form[] = ['label'=>'Enviar Documento','name'=>'documento','type'=>'upload','validation'=>'image|max:1000'];
			
			

			//
			// $columns[] = ['label'=>'Produtos','name'=>'id_produtos','type'=>'datamodal','datamodal_table'=>'produtos','datamodal_columns'=>'nome,preco','datamodal_select_to'=>'preco:preco','datamodal_where'=>'','datamodal_size'=>'large'];
			// $columns[] = ['label'=>'Preco','name'=>'preco','type'=>'number','required'=>true];
			// $columns[] = ['label'=>'QTY','name'=>'quantidade','type'=>'number','required'=>true];
			// $columns[] = ['label'=>'Discount','name'=>'desconto','type'=>'number','required'=>true];
			// $columns[] = ['label'=>'Sub Total','name'=>'subtotal','type'=>'number','formula'=>"[quantidade] * [preco] - [desconto]","readonly"=>true,'required'=>true];
			// $this->form[] = ['label'=>'Detalhes do Pedido','name'=>'detalhe_pedidos','type'=>'child','columns'=>$columns,'table'=>'detalhe_pedido','foreign_key'=>'id_pedidos'];


			

			
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nome','name'=>'nome','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:funcionarios','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
			//$this->form[] = ['label'=>'Endereco','name'=>'endereco','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Cargo','name'=>'cargo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Idade','name'=>'idade','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Nascimento','name'=>'nascimento','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();

			// $this->sub_module[] = ['label'=>'Fotos','path'=>'photos','parent_columns'=>'nome,descricao','foreign_key'=>'albums_id','button_color'=>'success','button_icon'=>'fa fa-bars'];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();
			$this->addaction[] = ['label'=>'Ativar','url'=>CRUDBooster::mainpath('set-status/Ativar/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[status] == 'Inativo'"];
			$this->addaction[] = ['label'=>'Desativar','url'=>CRUDBooster::mainpath('set-status/[inativar]/[id]'),'icon'=>'fa fa-ban','color'=>'warning','showIf'=>"[status] == 'Ativo'", 'confirmation' => true];
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

			$this->button_selected[] = ['label'=>'TesteBTN','icon'=>'fa fa-check','name'=>'TesteBTN'];

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert = array();
			$this->alert[] = ['message'=>'Funcionários sendo listados','type'=>'info'];


	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();

			$this->index_button[] = ['label'=>'Iníco Laravel','url'=>('/'),"icon"=>"fa fa-home"];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();
			$this->index_statistic[] = ['label'=>'Total Funcionários','count'=>DB::table('funcionarios')->count(),'icon'=>'fa fa-users','color'=>'success'];
			$this->index_statistic[] = ['label'=>'Total de Empresas','count'=>DB::table('empresas')->count(),'icon'=>'fa fa-check','color'=>'success'];



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = "
			
			$(function funcaoTeste(){
				console.log('teste');
			});
			
			";


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = "
			.active{
				color: red;
			}
			";
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }

		public function getSetStatus($status, $id) {
			if($status == "Ativar"){
				DB::table('funcionarios')->where('id',$id)->update(['status'=>"Ativo"]);
				$user = DB::table('funcionarios')->where('id',$id)->first();
				// dd($status);
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Status do usuário $user->nome alterado para $user->status com sucesso","success");
				
			}else{
				DB::table('funcionarios')->where('id',$id)->update(['status'=>"Inativo"]);
				$user = DB::table('funcionarios')->where('id',$id)->first();
				// dd($status);
				CRUDBooster::redirect($_SERVER['HTTP_REFERER'],"Status do usuário $user->nome alterado para $user->status com sucesso","success");

			}			
			
		 }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //$id_selected is an array of id 
			//$button_name is a name that you have set at button_selected 
			if($button_name == 'TesteBTN') {
				DB::table('funcionarios')->whereIn('id',$id_selected)->update(['status'=>'Ativo']);
			}
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
			// $query->where('id_status',1);
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here
			DB::table('produtos')->where('id_categorias',$id)->delete(); 
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }

		public function getAdd(){
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }
			
			$dados = [];
			$dados['empresas'] = Empresas::listaEmpresas();
			$dados['cargos'] = Cargo::all();
			$dados['statuses'] = Status::all();
			$dados['cidades'] = Cidade::all();
			
			return view('addFuncionarios', $dados);
		}

		public function postCadastrar(){
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			  }

			$cadastra = new Funcionarios();
			$cadastra->create(Request::all());
			return redirect('admin/funcionarios');
		}


	    //By the way, you can still create your own method in here... :) 

		
		// public function getLeonardo(){
		// 	dd('getLeonardo);
		// }
	}