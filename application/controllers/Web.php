<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library("pagination");
		$this->load->model('admin/TourPackageModel');
		$this->load->model('admin/CategoryModel');
		$this->load->model('admin/TestimonialModel');
		$this->load->model('admin/BlogModel');
		$this->load->model('admin/AboutModel');
		$this->load->model('admin/SlideModel');
		$this->load->model('admin/TransportModel');
	}

	public function index()
	{
		/*Category*/
		$slides = $this->SlideModel->get_all_view();
		$data['slide_list'] = $slides;

		/*Category*/
		$category = $this->CategoryModel->get_all_view();
		$data['category_list'] = $category;

		/*Tour Package*/
		$package = $this->TourPackageModel->get_all_view();
		$data['package_list'] = $package;

		/*Testimonial*/
		$testimonial = $this->TestimonialModel->get_all_view();
		$data['testimonial_value'] = $testimonial;
		
		/*Blog*/
		$blog = $this->BlogModel->get_all_view();
		$data['blog_value'] = $blog;

		/*Vision &Mission*/
		$about = $this->AboutModel->get_all_view();
		$data['about_value'] = $about;
		/*echo "<pre/>";print_r($data);*/
		
		$this->load->view('website/index' , $data);
	}

	public function golf()
	{
		/*Tour Golf Package*/
		$golf = $this->TourPackageModel->golf_tour();
		$data['golf_tour'] = $golf;
		$this->load->view('website/golf_tour' , $data);
	}

	public function about()
	{
		/*About Us*/
		$about = $this->AboutModel->get_all_view();
		$data['about_value'] = $about;

		/*Testimonial*/
		$testimonial = $this->TestimonialModel->get_all_view();
		$data['testimonial_value'] = $testimonial;
		
		$this->load->view('website/about_us',$data);
	}


	public function schedule()
	{
		$this->load->view('website/schedule');
	}

	public function book()
	{
		$this->load->view('website/book_schedule');
	}


	public function boat()
	{
		/*trasnport*/
		$trasnport = $this->TransportModel->get_all_view();
		$data['trasnport_value'] = $trasnport;
		$this->load->view('website/boat',$data);
	}


	public function safety()
	{
		$this->load->view('website/safety_first');
	}


	public function blog()
	{
		/*Blogs*/
			
			$config             = array();
			$config['base_url'] = base_url()."Web/blog";
			$config['per_page'] = 2;
			$config["uri_segment"] = 2;

			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = '« First';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Last »';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = 'Next →';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '← Previous';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';

			$config['page_query_string'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['total_rows'] = $this->BlogModel->get_count();

			$this->pagination->initialize($config);
			$page = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

			$query = $this->BlogModel->get_blogs($config["per_page"],$page);

			$data['blog_value'] = null;


			if($query){
				$data['blog_value'] =  $query;
			}

			/*echo "<pre/>";print_r($data);*/

			$this->load->view('website/blog', $data);
		}
	

	public function blogs()
	{
		$this->load->view('website/blog_inner');
	}

	public function contact()
	{
		$this->load->view('website/contact_us');
	}



}
