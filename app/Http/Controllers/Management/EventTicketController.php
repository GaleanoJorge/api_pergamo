<?php

namespace App\Http\Controllers\Management;

use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use App\Exports\GenerateExcelFromTemplate;
use App\Imports\EventTicketsImport;
use App\Models\EventConcept;
use App\Models\EventTicket;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventTicketRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
define('ARRAY_TYPE', CellSetterArrayValue::class);
define('ARRAY2D_TYPE', CellSetterArray2DValue::class);
define('STRING_TYPE', CellSetterStringValue::class);

class EventTicketController extends Controller
{
    public function index(Request $request): JsonResponse
    {

        $eventTickets = EventTicket::select('event_tickets.*')
            ->Join('users', 'users.id', 'event_tickets.passenger_user_id')
            ->join('event_concept', 'event_concept.id', 'event_tickets.event_concept_id');

        if ($request->_sort) {
            $eventTickets->orderBy($request->_sort, $request->_order);
        }

        if ($request->event_id) {
            $eventTickets->where('event_concept.event_id', $request->event_id);
        }

        if ($request->search) {
            $eventTickets->where('event_tickets.origin', 'like', '%' . $request->search . '%')
                ->orWhere('event_tickets.destination', 'like', '%' . $request->search . '%')
                ->orWhere('event_tickets.back', 'like', '%' . $request->search . '%')
                ->orWhere('event_tickets.ticket_number', 'like', '%' . $request->search . '%')
                ->orWhere('event_tickets.airline', 'like', '%' . $request->search . '%');
        }

        if ($request->query("pagination", true) === "false") {
            $eventTickets = $eventTickets->get()->toArray();
        } else {
            $page = $request->query("current_page", 1);
            $per_page = $request->query("per_page", 10);

            $eventTickets = $eventTickets->paginate($per_page, '*', 'page', $page);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tiquetes obtenidos exitosamente',
            'data' => ['eventTickets' => $eventTickets]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventTicketRequest $request
     * @return JsonResponse
     */
    public function store(EventTicketRequest $request): JsonResponse
    {
        $eventTicket = new EventTicket;
        $eventTicket->event_concept_id = $request->event_concept_id;
        $eventTicket->passenger_user_id = $request->passenger_user_id;
        $eventTicket->origin = $request->origin;
        $eventTicket->destination = $request->destination;
        $eventTicket->back = $request->back;
        $eventTicket->departure_date = $request->departure_date;
        $eventTicket->return_date = $request->return_date;
        $eventTicket->departure_observations = $request->departure_observations;
        $eventTicket->return_observations = $request->return_observations;
        $eventTicket->save();

        return response()->json([
            'status' => true,
            'message' => 'Tiquete requerido exitosamente',
            'data' => ['eventTicket' => $eventTicket->toArray()]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $eventTicket = EventTicket::where('id', $id)->get()->toArray();

        return response()->json([
            'status' => true,
            'message' => 'Tiquete obtenido exitosamente',
            'data' => ['eventTicket' => $eventTicket]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionalCouncilRequest $request
     * @param integer $id
     * @return JsonResponse
     */
    public function update(EventTicketRequest $request, int $id): JsonResponse
    {
        $eventTicket = EventTicket::find($id);
        $eventTicket->event_concept_id = $request->event_concept_id;
        $eventTicket->passenger_user_id = $request->passenger_user_id;
        $eventTicket->origin = $request->origin;
        $eventTicket->destination = $request->destination;
        $eventTicket->back = $request->back;
        $eventTicket->departure_date = $request->departure_date;
        $eventTicket->return_date = $request->return_date;
        $eventTicket->departure_observations = $request->departure_observations;
        $eventTicket->return_observations = $request->return_observations;
        $eventTicket->save();

        return response()->json([
            'status' => true,
            'message' => 'Tiquete actualizado exitosamente',
            'data' => ['eventTicket' => $eventTicket]
        ]);
    }

    public function storeRequireArray(Request $request): JsonResponse
    {
        $data = (array)$request->data;

        foreach ($data as $row) {
            if($row["passenger_user_id"] != "" && $row["origin"] != "" && $row["destination"] != ""){
                if (($row['id'] * 1) > 0) {
                    $eventTicket = EventTicket::find($row['id']);
                } else {
                    $eventTicket = new EventTicket;
                }

                $eventTicket->event_concept_id = $row["event_concept_id"];
                $eventTicket->passenger_user_id = $row["passenger_user_id"];
                $eventTicket->origin = $row["origin"];
                $eventTicket->destination = $row["destination"];
                $eventTicket->back = $row["back"];
                $eventTicket->departure_date = $row["departure_date"];
                $eventTicket->return_date = $row["return_date"];
                $eventTicket->departure_observations = $row["departure_observations"];
                $eventTicket->return_observations = $row["return_observations"];
                $eventTicket->save();
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Tiquetes requeridos exitosamente'
        ]);
    }

    public function updateBuyArray(Request $request): JsonResponse
    {
        $data = (array)$request->data;

        foreach ($data as $row) {
            $eventTicket = EventTicket::find($row['id']);
            $eventTicket->change_observations = $row['change_observations'];
            $eventTicket->ticket_number = $row['ticket_number'];
            $eventTicket->ticket_state = $row['ticket_state'];
            $eventTicket->airline = $row['airline'];
            $eventTicket->total_value = $row['total_value'];
            $eventTicket->save();

            EventConcept::updateRealTickets($eventTicket->event_concept_id);
        }

        return response()->json([
            'status' => true,
            'message' => 'Tiquetes actualizados exitosamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $eventTicket = EventTicket::find($id);
            $eventTicket->delete();

            return response()->json([
                'status' => true,
                'message' => 'Tiquete eliminado exitosamente',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'status' => false,
                'message' => 'El tiquete está en uso, no es posible eliminarlo.',
            ], 423);
        }
    }

    public function chargeDataTickets(Request $request):JsonResponse
    {
        $tickets = EventTicket::select('event_tickets.id','ticket_number')
            ->join('event_concept','event_tickets.event_concept_id','event_concept.id')
            ->join('event','event.id','event_concept.event_id')
            ->join('categories_origin','categories_origin.id','event.categories_origin_id')
            ->join('origin','origin.id','categories_origin.origin_id')
            ->where('origin.validity_id',$request->validity_id)->get()->toArray();
        $col_tickets=array_column($tickets,'ticket_number');
        //$array = Excel::toArray(new EventTicketsImport(), storage_path('AAA_-_Rama_judicial_2DIC.xls'));
        $array = Excel::toArray(new EventTicketsImport(), $request->file('xls_tickets'));
        $cr_update=[];
        foreach($array[0] as $row){
            if(in_array($row[7],$col_tickets)) {
                array_push($cr_update,$row);
            }
        }

        foreach($cr_update as $row){
            $date_aux = Carbon::create(1900, 01, 01, 0);
            $date_correct = $date_aux->addDays($row[5] - 2);
            $data=[
                'grade' => $row[8],
                //'ticket_state'=> $row[],
                'invoice_number' => $row[4],
                'invoice_date' => $date_correct,
                'administrative_fee' => $row[13],
                'iva' => $row[14],
                'ticket_value' => $row[15],
                'discount' => $row[20],
                'airport_fee' => $row[16],
                'fuel' => $row[17],
                'others_taxes' => $row[18],
                'iva_administrative_fee' => $row[19],
                'flight_review' => $row[21],
                'observations' => $row[22]
            ];
            EventTicket::where('ticket_number', $row[7])->update($data);
        }

        return response()->json([
            'status' => true,
            'message' => 'Se actualizaron '.count($cr_update).' Tiquetes',
        ]);
    }

    public function exportExcelReportTickets(Request $request): JsonResponse
    {
        $data = EventTicket::select('event.id',
            \DB::raw('CONCAT_WS(" ",users.lastname,users.firstname) AS nombre_coordinador'),
            'municipality.name AS city','program.name AS program','category.name AS subprogram',
            'event.name','event.initial_date','event.final_date',
            \DB::raw('CONCAT_WS(" ",passenger.lastname,passenger.firstname) AS nombre_pasajero'),
            'position.name AS cargo','contract.code', 'event_tickets.invoice_number'
            , 'event_tickets.invoice_date', 'event_tickets.total_value','event_tickets.ticket_number'
            , 'event_tickets.grade', 'event_tickets.airline'
            ,'event_tickets.origin', 'event_tickets.destination', 'event_tickets.back', 'event_tickets.flight_review'
            , 'event_tickets.administrative_fee', 'event_tickets.iva', 'event_tickets.ticket_value'
            , 'event_tickets.discount', 'event_tickets.airport_fee', 'event_tickets.fuel', 'event_tickets.others_taxes'
            , 'event_tickets.iva_administrative_fee'
        )
        ->join('users AS passenger','event_tickets.passenger_user_id','passenger.id')
            ->leftJoin('curriculum','curriculum.user_id','passenger.id')
            ->leftJoin('position','curriculum.position_id','position.id')
            ->join('event_concept','event_tickets.event_concept_id','event_concept.id')
            ->join('event','event.id','event_concept.event_id')
            ->leftJoin('contract','event.contract_id','contract.id')
            ->join('categories_origin', 'categories_origin.id', 'event.categories_origin_id')
            ->join('category', 'categories_origin.category_id', 'category.id')
            ->join('category AS program', 'category.category_parent_id', 'program.id')
            ->leftJoin('users', 'users.id', 'event.user_coordinate_id')
            ->Join('municipality', 'municipality.id', 'event.municipality_id')
            ->join('origin','origin.id','categories_origin.origin_id')
            ->where('origin.validity_id',$request->validity_id)
        ->groupBy('event_tickets.id')->get()->toArray();

        $tickets = [];
        $cons=[];
        $i = 1;
        foreach ($data as $key => $row) {
            array_push($cons, $i++);
            array_push($tickets, array_values((array)$row));
        }
        $params = [
            '[consecutivo]' => new ExcelParam(ARRAY_TYPE, $cons),
            '[[tiquetes]]' => new ExcelParam(ARRAY2D_TYPE, $tickets),
            '[[headers]]' => new ExcelParam(ARRAY2D_TYPE, [array('Número de Requerimiento', 'Coordinador del Acto Académico', 'Ciudad de Realización', 'Programa', 'Subprograma', 'Nombre del Acto Académico', 'Fecha de Inicio ', 'Fecha Final', 'Nombre del Pajero', 'Cargo', 'Número de Contrato', 'Número de Factura', 'Fecha de la Factura', 'Valor Total', 'Número de Tiquete Aèreo', 'Clase', 'Aerolínea', 'Ruta Salida', 'Ruta Destino', 'Ruta Regreso', 'Revisión Volado', 'Tasa Administrativa ', 'IVA', 'Valor del Tiquete', 'Descuento', 'Tasa Aeroportuaria', 'Combustible', 'Otros Impuestos', 'Iva Tasa Administrativa')])
        ];

        $events = [
            PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) {
                $sheet->mergeCells('A2:AD2');
                $sheet->mergeCells('A3:AD3');
                $sheet->mergeCells('A5:AD5');
                },
        ];

        $file = GenerateExcelFromTemplate::run(
            'CuadroSuministroTiquetes.xlsx',
            'temp_reports',
            $params,
            'cuadro_suministro_tiquetes',
            [],
            false,
            $events);

        return response()->json([
            'status' => true,
            'message' => 'Reporte generado exitosamente',
            'url' => $file,
        ]);
    }
}
