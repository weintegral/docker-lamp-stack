<?php
declare(strict_types = 1);

class OrderDetailController
{
    private Response $responseObj;
    private OrderDetailModel $orderDetailModel;

    public function __construct()
    {
        $this->responseObj = ObjectContainer::response();
        $this->orderDetailModel = ObjectContainer::orderDetailModel();
    }

    public function listAction(): string
    {
        try {
            $output = $this->orderDetailModel->findAll();
            return $this->responseObj->toJson($output);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        } catch (InvalidArgumentException) {
            return $this->responseObj->toJson(['status' => 'Invalid Argument Exception']);
        }
    }

    public function getByIdAction(): string
    {
        try {
            $urlPath= ObjectContainer::request()->getRequestPath();
            $urlPathData = explode( '/', $urlPath);
            $userProvidedOrderDetailId =(int)$urlPathData[2];

            $output = $this->orderDetailModel->findById($userProvidedOrderDetailId);
            return $this->responseObj->toJson($output);
        } catch (PDOException) {
            return $this->responseObj->toJson(['status' => 'Database issue']);
        } catch (LogicException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }

    public function createAction(): string
    {
        try {
            $userProvidedData = ObjectContainer::request()->getRequestBody();
            $this->orderDetailModel->insert($userProvidedData);
            return $this->responseObj->setResponseCode(201)
                ->toJson(['status' => 'success']);
        } catch (PDOException $exception) {
            return $this->responseObj->toJson(['status' => $exception->getMessage()]);
        }
    }
}