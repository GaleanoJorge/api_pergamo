<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

class EventTicketsImport implements ToModel
{
    public function model(array $row)
    {
        return $row;
        /*
        $ticket = EventTicket::select('id')->where('ticket_number',$row[7])->first();
        if(($ticket->id)>0){
            return new EventTicket([
                'grade' => $row[8],
                //'ticket_state'=> $row[],
                'invoice_number' => $row[4],
                'invoice_date' => $row[5],
                'administrative_fee'=> $row[13],
                'iva' => $row[14],
                'ticket_value' => $row[15],
                'discount'=> $row[20],
                'airport_fee' => $row[16],
                'fuel' => $row[17],
                'others_taxes'=> $row[18],
                'iva_administrative_fee' => $row[19],
                'flight_review'=> $row[21],
                'observations' => $row[22]
            ]);
        }else{
            return null;
        }
        */
    }
}
