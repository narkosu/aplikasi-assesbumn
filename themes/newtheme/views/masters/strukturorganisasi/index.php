<?php
Yii::app()->clientscript
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/orgchart.js' );

Yii::app()->clientscript->registerScript('OrgChart', "
    var o = new orgChart();

    o.setFont('Arial', 18);
    o.addNode( 0, '', '', 'Menteri BUMN', 1);

    o.setFont('Arial', 12);
    o.addNode('',  0, 'l', 'Wakil Menteri');
    /*o.addNode('',  0, 'l', 'Secretary');
    o.addNode('',  0, 'l', 'Marketing');
    o.addNode('',  0, 'l', 'Human resources');
    */

    /*o.setColor('#99CC99', '#CCFFCC');
    o.addNode(12,  0, 'r', 'Facility');
    o.addNode('', 12, 'r', 'IT');
    o.addNode('', 12, 'r', 'Resource planning');
    */
    o.setFont('Arial', 14);
    o.setColor('#CCCC66', '#FFFF99');
    o.addNode(20,  0, 'u', 'Deputi Bidang Usaha Industri Strategis dan Manufaktur', 1);

    o.setFont('Arial', 12);
    o.setSize(150,50);
    o.addNode(21, 20, 'u', 'Asdep  Bidang Usaha Industri Strategis dan Manufaktur I');
    o.addNode(22, 21, '1', 'Bidang Usaha Industri Strategis dan Manufaktur Ia');
    o.addNode(23, 22, '1', 'Subbidang Usaha Industri Strategis dan Manufaktur Ia1');
    o.addNode(24, 22, '1', 'Subbidang Usaha Industri Strategis dan Manufaktur Ia2');
    /*o.addNode('', 20, 'r', 'Finance');
    o.addNode('', 20, 'l', 'Development');
    o.addNode('', 20, 'l', 'Maintenance');
    o.addNode('', 20, 'l', 'Specials');
    */
    o.setColor('#CC4950', '#FF7C80');
    o.setFont('Arial', 14);
    o.addNode(30,  0, 'u', 'Deputi Bidang Usaha Industri Primer', 1);

    o.setFont('Arial', 12);
    o.addNode(31, 30, 'u', 'Asdep  Bidang Usaha Industri Primer I');
    o.addNode(32, 31, 'l', 'Bidang Usaha Industri Primer Ia');
    o.addNode(33, 32, 'r', 'Subbidang Usaha Industri Primer Ia1');
    o.addNode(34, 32, 'l', 'Subbidang Usaha Industri Primer Ia2');
    o.addNode(35, 31, 'r', 'Bidang Usaha Industri Primer Ib');
    o.addNode(36, 35, 'l', 'Subbidang Usaha Industri Primer Ib1');
    o.addNode(37, 35, 'r', 'Subbidang Usaha Industri Primer Ib2');
    
    o.setColor('#CC4950', '#FF7C80');
    o.setFont('Arial', 14);
    o.addNode(50,  0, 'u', 'Deputi Bidang Usaha Infrastruktur dan Logistik', 1);

    o.setFont('Arial', 12);
    o.addNode(51, 50, 'l', 'Asdep  Bidang Usaha Infrastruktur dan Logistik I');
    o.addNode(54, 51, 'l', 'Bidang Usaha Infrastruktur dan Logistik Ia');
    o.addNode(55, 51, 'r', 'Bidang Usaha Infrastruktur dan Logistik Ib');
    o.addNode(56, 55, 'l', 'Subbidang Usaha Infrastruksur dan Logistik Ia1');
    o.addNode(57, 55, 'r', 'Subbidang Usaha Infrastruksur dan Logistik Ia2');
    o.addNode(52, 50, 'l', 'Asdep  Bidang Usaha Infrastruktur dan Logistik II');
    o.addNode(53, 50, 'r', 'Asdep  Bidang Usaha Infrastruktur dan Logistik III');
    

    /*o.addNode('', 33, 'r', 'Special A');
    o.addNode('', 33, 'r', 'Special B');
    o.addNode('', 33, 'r', 'Advice');
    o.addNode('', 30, 'l', 'Taskforce');
    
    o.setColor('#CC9966', '#FFCC99');
    o.setFont('Arial', 18);
    o.addNode(40,  0, 'u', 'Programming', 1);

    o.setFont('Arial', 12);
    o.addNode(41, 40, 'l', 'Management');
    o.addNode(42, 40, 'l', 'Finance');
    o.addNode('', 40, 'r', 'Assessment');
    o.addNode('', 40, 'r', 'Coding team');
    o.addNode('', 40, 'r', 'Quality control');*/

    o.drawChart('canvas1');
    ");
?>
<H1>STRUKTUR ORGANISASI</H2>

<canvas id="canvas1" width="2000" height="600"></canvas>