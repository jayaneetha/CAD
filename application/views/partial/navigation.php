<?php
switch ($position) {
    case 'admin':
        $position = 'Administrator';
        $this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position));
        break;
    case 'cad':
        $position = 'CAD Member';
        $this->load->view('partial/cad_navigation', array('user' => $user, 'position' => $position));
        break;
    case 'donor':
        $position = 'Donor';
        $this->load->view('partial/donor_navigation', array('user' => $user, 'position' => $position));
        break;
    case 'student':
        $position = 'Student';
        $this->load->view('partial/student_navigation', array('user' => $user, 'position' => $position));
        break;
}