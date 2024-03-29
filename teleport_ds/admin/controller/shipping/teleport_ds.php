<?php
class ControllerShippingTeleportDS extends Controller {
	private $error = array();

	public function index() {
		if(version_compare(VERSION, '1.5.5', '>='))
		{
			$this->language->load('shipping/teleport_ds');
		} else {
			$this->load->language('shipping/teleport_ds');
		}

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('teleport_ds', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
		$this->data['text_none'] = $this->language->get('text_none');

		$this->data['entry_tax'] = $this->language->get('entry_tax');
		$this->data['entry_teleport_ds_geo_zone'] = $this->language->get('entry_teleport_ds_geo_zone');
		$this->data['entry_teleport_ds_status'] = $this->language->get('entry_teleport_ds_status');
		$this->data['entry_teleport_ds_sort_order'] = $this->language->get('entry_teleport_ds_sort_order');

		$this->data['entry_teleport_ds_email'] = $this->language->get('entry_teleport_ds_email');
		$this->data['entry_teleport_ds_password'] = $this->language->get('entry_teleport_ds_password');
		$this->data['entry_teleport_ds_store_id'] = $this->language->get('entry_teleport_ds_store_id');
		$this->data['entry_teleport_ds_warehouse_id'] = $this->language->get('entry_teleport_ds_warehouse_id');
		$this->data['entry_teleport_ds_warehouser_id'] = $this->language->get('entry_teleport_ds_warehouser_id');
		$this->data['entry_teleport_ds_instruction'] = $this->language->get('entry_teleport_ds_instruction');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_shipping'),
			'href'      => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('shipping/teleport_ds', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

		$this->data['action'] = $this->url->link('shipping/teleport_ds', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['teleport_ds_geo_zone_id'])) {
			$this->data['teleport_ds_geo_zone_id'] = $this->request->post['teleport_ds_geo_zone_id'];
		} else {
			$this->data['teleport_ds_geo_zone_id'] = $this->config->get('teleport_ds_geo_zone_id');
		}

		if (isset($this->request->post['teleport_ds_status'])) {
			$this->data['teleport_ds_status'] = $this->request->post['teleport_ds_status'];
		} else {
			$this->data['teleport_ds_status'] = $this->config->get('teleport_ds_status');
		}

		if (isset($this->request->post['teleport_ds_sort_order'])) {
			$this->data['teleport_ds_sort_order'] = $this->request->post['teleport_ds_sort_order'];
		} else {
			$this->data['teleport_ds_sort_order'] = $this->config->get('teleport_ds_sort_order');
		}

		if (isset($this->request->post['teleport_ds_email'])) {
			$this->data['teleport_ds_email'] = $this->request->post['teleport_ds_email'];
		} else {
			$this->data['teleport_ds_email'] = $this->config->get('teleport_ds_email');
		}
		if (isset($this->request->post['teleport_ds_password'])) {
			$this->data['teleport_ds_password'] = $this->request->post['teleport_ds_password'];
		} else {
			$this->data['teleport_ds_password'] = $this->config->get('teleport_ds_password');
		}
		if (isset($this->request->post['teleport_ds_store_id'])) {
			$this->data['teleport_ds_store_id'] = $this->request->post['teleport_ds_store_id'];
		} else {
			$this->data['teleport_ds_store_id'] = $this->config->get('teleport_ds_store_id');
		}
		if (isset($this->request->post['teleport_ds_warehouse_id'])) {
			$this->data['teleport_ds_warehouse_id'] = $this->request->post['teleport_ds_warehouse_id'];
		} else {
			$this->data['teleport_ds_warehouse_id'] = $this->config->get('teleport_ds_warehouse_id');
		}
		if (isset($this->request->post['teleport_ds_warehouser_id'])) {
			$this->data['teleport_ds_warehouser_id'] = $this->request->post['teleport_ds_warehouser_id'];
		} else {
			$this->data['teleport_ds_warehouser_id'] = $this->config->get('teleport_ds_warehouser_id');
		}

		$this->load->model('localisation/geo_zone');

		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		$this->template = 'shipping/teleport_ds.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'shipping/teleport_ds')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
}
?>
