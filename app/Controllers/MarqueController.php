<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MarqueController extends ResourceController
{
    protected $modelName  = 'App\models\Marque';
    protected $format     = 'json';

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_marque' => $this->model->orderBy('NOM', 'DESC')->findAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data = [
            'message' => 'success',
            'data_marque' => $this->model->find($id)
        ];

        if ($data['data_marque'] == null) {
            return $this->failNotFound($id);
        }

        return $this->respond($data, 200);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = $this->validate([
            'nom' => 'required'
        ]);

        if (!$rules){
			$response = [
				'message' => $this->validator->getErrors()
			];
		return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'NOM' => esc($this->request->getVar('nom'))
        ]);

        $response = [
            'message' => 'Données ajoutées'
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = $this->validate([
            'nom' => 'required'
        ]);

        if (!$rules){
			$response = [
				'message' => $this->validator->getErrors()
			];		
            return $this->failValidationErrors($response);
        }

        $this->model->update($id, [
            'NOM' => esc($this->request->getVar('nom'))
        ]);

        $response = [
            'message' => 'Données modifiées'
        ];
        return $this->respond($response, 200);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($this->model->find($id) == null) {
                return $this->failNotFound('Aucune donnée à supprimer');
        }

        $this->model->delete($id);

        $response = [
            'message' => 'Données supprimées'
        ];
        return $this->respondDeleted($response);
    }
}
