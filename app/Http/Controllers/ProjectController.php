<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProjectController extends Controller
{
    public function getMessages(Request $request){

        return $this->messages($request);
        
       
    }

    public function myMessages($message_key){
        $messages=[
            ['type'=>'invalid_city','message'=>'Please select city name'],
            ['type'=>'invalid_tracking','message'=>'Please select correct 3pl comapny'],
            ['type'=>'incorrect_city','message'=>'Please select correct city'],
            ['type'=>'invalid_tracking','message'=>'Please select correct tracking comapny'],
            ['type'=>'incorrect_destination','message'=>'Please select correct destination'],
            ['type'=>'invalid_tracking','message'=>'Please select correct tracking comapny destination'],
            ['type'=>'gatewayuser_incorrect','message'=>'gatewayuser provided was invalid'],
            ['type'=>'customerCode','message'=>'customerCode provided was incorrect'],
            ['type'=>'operator_name','message'=>'operator name provided was incorrect'],
            ['type'=>'receiverAddress','message'=>'receiver address provided was incorrect'],
            ['type'=>'receiverName','message'=>'receiver name provided was incorrect'],
            ['type'=>'receiverCity','message'=>'receiver city provided was incorrect'],
            ['type'=>'receiverCountry','message'=>'receiver Country provided was incorrect please enter correct country name'],
            ['type'=>'receiverProvince','message'=>'receiver Province provided was incorrect please enter correct Province name'],
            ['type'=>'deliveryType','message'=>'delivery type provided was incorrect please enter correct delivery type name'],
            ['type'=>'cod','message'=>'cod provided was incorrect please enter correct cod'],

        ];
        $message_body= collect($messages)->where('type',$message_key)->first();
      return !empty($message_body) ?  $message_body['message'] :  false;
    }

    public function messages($request){

        $messages_array=[


            // trax errors work starts here
               [
              'courier'=>'trax',
              'code'=>400,
              'error'=>'Invalid pickup or delivery city',
              'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
               ],
              [   
               'courier'=>'trax',
               'code'=>400,
               'error'=>'Invalid gateway user',
               'custom_message'=>$this->myMessages('gatewayuser_incorrect') ?  $this->myMessages('gatewayuser_incorrect') : 'Invalid gateway user',
              ],

             [   
                'courier'=>'trax',
                'code'=>400,
                'error'=>'Invalid operator name',
                'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                ],

                [   
                'courier'=>'trax',
                'code'=>400,
                'error'=>'Invalid operator name',
                'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                 ],

               [   
                'courier'=>'trax',
                'code'=>400,
                'error'=>'Invalid customerCode',
                'custom_message'=>$this->myMessages('customerCode') ?  $this->myMessages('customerCode') : 'Invalid customerCode',
                ],

                [   
                'courier'=>'trax',
                'code'=>400,
                'error'=>'Invalid receiver address',
                 'custom_message'=>$this->myMessages('receiverAddress') ?  $this->myMessages('receiverAddress') : 'Invalid receiver address',
                ],

                [   
                'courier'=>'trax',
                'code'=>400,
                'error'=>'Invalid receiver name',
                'custom_message'=>$this->myMessages('receiverName') ?  $this->myMessages('receiverName') : 'Invalid receiver name',
                ],

                [   
               'courier'=>'trax',
               'code'=>400,
               'error'=>'Invalid receiver city',
               'custom_message'=>$this->myMessages('receiverCity') ?  $this->myMessages('receiverCity') : 'Invalid receiver city',
                ],

                [   
                  'courier'=>'trax',
                  'code'=>400,
                  'error'=>'Invalid receiver country',
                   'custom_message'=>$this->myMessages('receiverCountry') ?  $this->myMessages('receiverCountry') : 'Invalid receiver country',
                ],

                   [   
                    'courier'=>'trax',
                    'code'=>400,
                    'error'=>'Invalid receiver province',
                     'custom_message'=>$this->myMessages('receiverProvince') ?  $this->myMessages('receiverProvince') : 'Invalid receiver province',
                ],

                  [   
                      'courier'=>'trax',
                      'code'=>400,
                      'error'=>'Invalid delivery type',
                       'custom_message'=>$this->myMessages('deliveryType') ?  $this->myMessages('deliveryType') : 'Invalid delivery type',
                  ],

                  [   
                    'courier'=>'trax',
                    'code'=>400,
                    'error'=>'Invalid cod',
                    'custom_message'=>$this->myMessages('cod') ?  $this->myMessages('cod') : 'Invalid cod',
                ],
    
                // trax errors work ends here



                // postex errors work starts here

                [
                    'courier'=>'postex',
                    'code'=>400,
                    'error'=>'Invalid pickup or delivery city',
                    'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
                ],
                [   
                     'courier'=>'postex',
                     'code'=>400,
                     'error'=>'Invalid gateway user',
                     'custom_message'=>$this->myMessages('gatewayuser_incorrect') ?  $this->myMessages('gatewayuser_incorrect') : 'Invalid gateway user',
                  ],
      
                  [   
                      'courier'=>'postex',
                      'code'=>400,
                      'error'=>'Invalid operator name',
                      'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                      ],
      
                      [   
                      'courier'=>'postex',
                      'code'=>400,
                      'error'=>'Invalid operator name',
                      'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                       ],
      
                     [   
                      'courier'=>'postex',
                      'code'=>400,
                      'error'=>'Invalid customerCode',
                      'custom_message'=>$this->myMessages('customerCode') ?  $this->myMessages('customerCode') : 'Invalid customerCode',
                      ],
      
                      [   
                      'courier'=>'postex',
                      'code'=>400,
                      'error'=>'Invalid receiver address',
                       'custom_message'=>$this->myMessages('receiverAddress') ?  $this->myMessages('receiverAddress') : 'Invalid receiver address',
                      ],
      
                      [   
                      'courier'=>'postex',
                      'code'=>400,
                      'error'=>'Invalid receiver name',
                      'custom_message'=>$this->myMessages('receiverName') ?  $this->myMessages('receiverName') : 'Invalid receiver name',
                      ],
      
                      [   
                     'courier'=>'postex',
                     'code'=>400,
                     'error'=>'Invalid receiver city',
                      'custom_message'=>$this->myMessages('receiverCity') ?  $this->myMessages('receiverCity') : 'Invalid receiver city',
                      ],

                      [   
                        'courier'=>'postex',
                        'code'=>400,
                        'error'=>'Invalid receiver country',
                         'custom_message'=>$this->myMessages('receiverCountry') ?  $this->myMessages('receiverCountry') : 'Invalid receiver country',
                      ],
      
                         [   
                          'courier'=>'postex',
                          'code'=>400,
                          'error'=>'Invalid receiver province',
                           'custom_message'=>$this->myMessages('receiverProvince') ?  $this->myMessages('receiverProvince') : 'Invalid receiver province',
                      ],
      
                        [   
                            'courier'=>'postex',
                            'code'=>400,
                            'error'=>'Invalid delivery type',
                             'custom_message'=>$this->myMessages('deliveryType') ?  $this->myMessages('deliveryType') : 'Invalid delivery type',
                        ],
      
                        [   
                          'courier'=>'postex',
                          'code'=>400,
                          'error'=>'Invalid cod',
                          'custom_message'=>$this->myMessages('cod') ?  $this->myMessages('cod') : 'Invalid cod',
                      ],
          

                       // postex errors work ends here



                       // forrun errors work starts here
                       [
                        'courier'=>'forrun',
                        'code'=>400,
                        'error'=>'Invalid pickup or delivery city',
                        'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
                        ],
                        [   
                         'courier'=>'forrun',
                         'code'=>400,
                         'error'=>'Invalid gateway user',
                         'custom_message'=>$this->myMessages('gatewayuser_incorrect') ?  $this->myMessages('gatewayuser_incorrect') : 'Invalid gateway user',
                        ],
          
                        [   
                          'courier'=>'forrun',
                          'code'=>400,
                          'error'=>'Invalid operator name',
                          'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                          ],
          
                          [   
                          'courier'=>'forrun',
                          'code'=>400,
                          'error'=>'Invalid operator name',
                          'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                           ],
          
                         [   
                          'courier'=>'forrun',
                          'code'=>400,
                          'error'=>'Invalid customerCode',
                          'custom_message'=>$this->myMessages('customerCode') ?  $this->myMessages('customerCode') : 'Invalid customerCode',
                          ],
          
                          [   
                          'courier'=>'forrun',
                          'code'=>400,
                          'error'=>'Invalid receiver address',
                           'custom_message'=>$this->myMessages('receiverAddress') ?  $this->myMessages('receiverAddress') : 'Invalid receiver address',
                          ],
          
                          [   
                          'courier'=>'forrun',
                          'code'=>400,
                          'error'=>'Invalid receiver name',
                          'custom_message'=>$this->myMessages('receiverName') ?  $this->myMessages('receiverName') : 'Invalid receiver name',
                          ],
          
                          [   
                         'courier'=>'forrun',
                         'code'=>400,
                         'error'=>'Invalid receiver city',
                          'custom_message'=>$this->myMessages('receiverCity') ?  $this->myMessages('receiverCity') : 'Invalid receiver city',
                          ],

                          [   
                            'courier'=>'forrun',
                            'code'=>400,
                            'error'=>'Invalid receiver country',
                             'custom_message'=>$this->myMessages('receiverCountry') ?  $this->myMessages('receiverCountry') : 'Invalid receiver country',
                          ],
          
                             [   
                              'courier'=>'forrun',
                              'code'=>400,
                              'error'=>'Invalid receiver province',
                               'custom_message'=>$this->myMessages('receiverProvince') ?  $this->myMessages('receiverProvince') : 'Invalid receiver province',
                          ],
          
                            [   
                                'courier'=>'forrun',
                                'code'=>400,
                                'error'=>'Invalid delivery type',
                                 'custom_message'=>$this->myMessages('deliveryType') ?  $this->myMessages('deliveryType') : 'Invalid delivery type',
                            ],
          
                            [   
                              'courier'=>'forrun',
                              'code'=>400,
                              'error'=>'Invalid cod',
                              'custom_message'=>$this->myMessages('cod') ?  $this->myMessages('cod') : 'Invalid cod',
                          ],
              

                        //  forrun errors work ends here
    

                        // TCS errors work starts here
                          

                        [
                            'courier'=>'TCS',
                            'code'=>400,
                            'error'=>'Invalid pickup or delivery city',
                            'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
                            ],
                            [   
                             'courier'=>'TCS',
                             'code'=>400,
                             'error'=>'Invalid gateway user',
                             'custom_message'=>$this->myMessages('gatewayuser_incorrect') ?  $this->myMessages('gatewayuser_incorrect') : 'Invalid gateway user',
                            ],
              
                            [   
                              'courier'=>'TCS',
                              'code'=>400,
                              'error'=>'Invalid operator name',
                              'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                              ],
              
                              [   
                              'courier'=>'TCS',
                              'code'=>400,
                              'error'=>'Invalid operator name',
                              'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                               ],
              
                             [   
                              'courier'=>'TCS',
                              'code'=>400,
                              'error'=>'Invalid customerCode',
                              'custom_message'=>$this->myMessages('customerCode') ?  $this->myMessages('customerCode') : 'Invalid customerCode',
                              ],
              
                              [   
                              'courier'=>'TCS',
                              'code'=>400,
                              'error'=>'Invalid receiver address',
                              'custom_message'=>$this->myMessages('receiverAddress') ?  $this->myMessages('receiverAddress') : 'Invalid receiver address',
                              ],
              
                              [   
                              'courier'=>'TCS',
                              'code'=>400,
                              'error'=>'Invalid receiver name',
                              'custom_message'=>$this->myMessages('receiverName') ?  $this->myMessages('receiverName') : 'Invalid receiver name',
                              ],
              
                              [   
                             'courier'=>'TCS',
                             'code'=>400,
                             'error'=>'Invalid receiver city',
                             'custom_message'=>$this->myMessages('receiverCity') ?  $this->myMessages('receiverCity') : 'Invalid receiver city',
                              ],

                              [   
                                'courier'=>'TCS',
                                'code'=>400,
                                'error'=>'Invalid receiver country',
                                'custom_message'=>$this->myMessages('receiverCountry') ?  $this->myMessages('receiverCountry') : 'Invalid receiver country',
                              ],
              
                                 [   
                                  'courier'=>'TCS',
                                  'code'=>400,
                                  'error'=>'Invalid receiver province',
                                   'custom_message'=>$this->myMessages('receiverProvince') ?  $this->myMessages('receiverProvince') : 'Invalid receiver province',
                              ],
              
                                [   
                                    'courier'=>'TCS',
                                    'code'=>400,
                                    'error'=>'Invalid delivery type',
                                     'custom_message'=>$this->myMessages('deliveryType') ?  $this->myMessages('deliveryType') : 'Invalid delivery type',
                                ],
              
                                [   
                                  'courier'=>'TCS',
                                  'code'=>400,
                                  'error'=>'Invalid cod',
                                  'custom_message'=>$this->myMessages('cod') ?  $this->myMessages('cod') : 'Invalid cod',
                              ],
                  

                        //   TCS errors work ends here


                         //   rider errors work starts here
    
                         [
                            'courier'=>'rider',
                            'code'=>400,
                            'error'=>'Invalid pickup or delivery city',
                            'custom_message'=>$this->myMessages('invalid_city') ?  $this->myMessages('invalid_city') : 'Invalid pickup or delivery city',
                            ],
                            [   
                             'courier'=>'rider',
                             'code'=>400,
                             'error'=>'Invalid gateway user',
                             'custom_message'=>$this->myMessages('gatewayuser_incorrect') ?  $this->myMessages('gatewayuser_incorrect') : 'Invalid gateway user',
                            ],
              
                            [   
                              'courier'=>'rider',
                              'code'=>400,
                              'error'=>'Invalid operator name',
                              'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                              ],
              
                              [   
                              'courier'=>'rider',
                              'code'=>400,
                              'error'=>'Invalid operator name',
                              'custom_message'=>$this->myMessages('operator_name') ?  $this->myMessages('operator_name') : 'Invalid operator name',
                               ],
              
                             [   
                              'courier'=>'rider',
                              'code'=>400,
                              'error'=>'Invalid customerCode',
                              'custom_message'=>$this->myMessages('customerCode') ?  $this->myMessages('customerCode') : 'Invalid customerCode',
                              ],
              
                              [   
                              'courier'=>'rider',
                              'code'=>400,
                              'error'=>'Invalid receiver address',
                               'custom_message'=>$this->myMessages('receiverAddress') ?  $this->myMessages('receiverAddress') : 'Invalid receiver address',
                              ],
              
                              [   
                              'courier'=>'rider',
                              'code'=>400,
                              'error'=>'Invalid receiver name',
                              'custom_message'=>$this->myMessages('receiverName') ?  $this->myMessages('receiverName') : 'Invalid receiver name',
                              ],
              
                              [   
                             'courier'=>'rider',
                             'code'=>400,
                             'error'=>'Invalid receiver city',
                              'custom_message'=>$this->myMessages('receiverCity') ?  $this->myMessages('receiverCity') : 'Invalid receiver city',
                              ],

                              [   
                                'courier'=>'rider',
                                'code'=>400,
                                'error'=>'Invalid receiver country',
                                 'custom_message'=>$this->myMessages('receiverCountry') ?  $this->myMessages('receiverCountry') : 'Invalid receiver country',
                              ],
              
                                [   
                                  'courier'=>'rider',
                                  'code'=>400,
                                  'error'=>'Invalid receiver province',
                                   'custom_message'=>$this->myMessages('receiverProvince') ?  $this->myMessages('receiverProvince') : 'Invalid receiver province',
                              ],
              
                                [   
                                    'courier'=>'rider',
                                    'code'=>400,
                                    'error'=>'Invalid delivery type',
                                     'custom_message'=>$this->myMessages('deliveryType') ?  $this->myMessages('deliveryType') : 'Invalid delivery type',
                                ],
              
                                [   
                                  'courier'=>'rider',
                                  'code'=>400,
                                  'error'=>'Invalid cod',
                                  'custom_message'=>$this->myMessages('cod') ?  $this->myMessages('cod') : 'Invalid cod',
                              ],
                  

                            //   rider errors work ends here

         ];
    if (!empty($request->courier) && !empty($request->error)){

    $result=collect($messages_array)->where('courier',$request->courier)->where('error',$request->error)->first();
     
     }
     if(empty($result)){
      $errror=[
        'courier'=>$request->courier,
        'error'=>$request->error,
        'custom_message'=>'',
      ];
      } 
    $message= !empty($result) ? ['courier'=>$result['courier'], 'custom_message'=>$result['custom_message']] : ['courier'=>$errror['courier'], 'error'=>$errror['error']];
    return  response()->json($message);
      // isset($result['error']);
     
    }
}
