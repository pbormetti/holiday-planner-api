<?php

namespace App\Controller;


use App\Component\JsonResponse;
use App\Entity\HolidayRequest;
use App\Form\AddHolidayRequestType;
use App\Form\EditHolidayRequestType;
use App\Repository\HolidayRequestRepository;
use App\Service\HolidayRequestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/holiday")
 */
final class HolidayRequestController extends AbstractController
{
    /**
     * @Route("/all", methods={"GET"})
     * @param HolidayRequestRepository $repository
     * @return Response
     */
    public function getAll(HolidayRequestRepository $repository): Response
    {
        return new JsonResponse($repository->findAll());
    }

    /**
     * @Route("/{id}", methods={"GET"}, name="holiday_getone")
     * @param HolidayRequest $holidayRequest
     * @return Response
     */
    public function getOne(HolidayRequest $holidayRequest): Response
    {
        return new JsonResponse($holidayRequest);
    }

    /**
     * @Route("/add", methods={"POST"})
     * @param Request $request
     * @param HolidayRequestService $service
     * @return Response
     */
    public function add(Request $request, HolidayRequestService $service): Response
    {
        $requestBody = json_decode($request->getContent(), true);
        $form = $this->createForm(AddHolidayRequestType::class);
        $form->submit($requestBody);

        if ($form->isValid() === false)
            throw new BadRequestHttpException();

        $newHolidayRequest = $service->add($form->getData());

        return new JsonResponse($newHolidayRequest, JsonResponse::HTTP_CREATED, [
            "Location" => $this->generateUrl("holiday_getone", ["id" => $newHolidayRequest->getId()])
        ]);
    }

    /**
     * @Route("/{id}/edit", methods={"PUT"})
     * @param Request $request
     * @param HolidayRequest $holidayRequest
     * @param HolidayRequestService $service
     * @return Response
     */
    public function edit(Request $request, HolidayRequest $holidayRequest, HolidayRequestService $service): Response
    {
        $requestBody = json_decode($request->getContent(), true);
        $form = $this->createForm(EditHolidayRequestType::class);
        $form->submit($requestBody);

        if ($form->isValid() === false)
            throw new BadRequestHttpException();

        $service->edit($holidayRequest, $form->getData());

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/{id}/approve1", methods={"PUT"})
     * @param HolidayRequest $holidayRequest
     * @param HolidayRequestService $service
     * @return Response
     */
    public function approveOne(HolidayRequest $holidayRequest, HolidayRequestService $service): Response
    {
        $service->approve1($holidayRequest);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/{id}/approve2", methods={"PUT"})
     * @param HolidayRequest $holidayRequest
     * @param HolidayRequestService $service
     * @return Response
     */
    public function approveTwo(HolidayRequest $holidayRequest, HolidayRequestService $service): Response
    {
        $service->approve2($holidayRequest);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}