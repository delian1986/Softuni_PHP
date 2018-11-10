<?php


namespace App\Http;


use App\Data\ReportStatisticDTO;
use App\Data\StatisticsDTO;
use App\Data\UserDTO;
use App\Service\StatisticsServiceInterface;
use App\Service\UserServiceInterface;

class StatisticsHttpHandler extends HttpHandlerAbstract
{
    public function statistics(UserServiceInterface $userService,StatisticsServiceInterface $statisticsService){
        if (!isset($_SESSION['id'])){
            $this->redirect('index.php');
        }

        /**
         * @var StatisticsDTO $statistics
         *@var UserDTO $currUser
         */
        $currUser=$userService->currentUser();
        $statistics=$statisticsService->getStatistics(intval($currUser->getId()));
        $reportStatisticDto=new ReportStatisticDTO();
        $reportStatisticDto->setUser($currUser);
        $reportStatisticDto->setStatistic($statistics);
        $this->render('statistics/all',$reportStatisticDto);

    }
}