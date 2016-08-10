<?php

return array(
	
		//'item/([0-9]+)' => 'main/view/$1',

		'^login$' => 'login/index',

		'^logout$' => 'login/logout',

		'^user$' => 'login/verify',


		'^make-change$' => 'manage/update',


		'^delete-order/([0-9]+)$' => 'order/delete/$1',

		'^new-order$' => 'order/add',

		'^orders$' => 'order/show',


		'^contacts$' => 'data/showContacts/3',


		'^delete-service/([0-9]+)$' => 'data/deleteService/$1',

		'^services$' => 'data/showServices/2',


		'^(.*)$' => 'data/index/1',
	);