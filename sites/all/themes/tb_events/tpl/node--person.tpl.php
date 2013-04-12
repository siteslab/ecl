<?php
//print_r($node);
global $base_url;

// Photo and Bio

if ($node->field_photo['und'][0]['filename']) {
	print '<div class="image-bio"><img class="field_photo" align="left" src="'.$base_url.'/sites/default/files/'.$node->field_photo['und'][0]['filename'].'"/>'.$node->body['en'][0]['safe_value'].'<div style="clear:both"></div></div>';
} else if ($node->body['en'][0]['safe_value']) {
	print '<div class="image-bio">'.$node->body['en'][0]['safe_value'].'</div>';
}

// Titles

if ($node->field_title['und'][0]['safe_value'] || $node->field_department_position['und'][0]['safe_value']) {
	print '<div class="titles"><h4>Titles</h4>'.'<p class="department-role">'.$node->field_department_position['und'][0]['safe_value'].'</p>'.$node->field_title['und'][0]['safe_value'].'</div>';
}


// History

if ($node->field_hire_date['und'][0]['value'] || $node->field_degrees['und'][0]['safe_value'] || $node->field_website['und'][0]['safe_value'] || $node->field_cv['und'][0]['filename']) {
	print '<div class="history"><h4>History</h4>';

	if ($node->field_hire_date['und'][0]['value']) {
		print '<div class="hire_date">Hire Date: '.$node->field_hire_date['und'][0]['value'].'</div>';
	}

	if ($node->field_degrees['und'][0]['safe_value']) {
		print '<div class="degrees">'.$node->field_degrees['und'][0]['safe_value'].'</div>';
	}

	if ($node->field_website['und'][0]['safe_value']) {
		print '<div class="website"><a href="'.$node->field_website['und'][0]['safe_value'].'">Website</a></div>';
	}

	if ($node->field_cv['und'][0]['filename']) {
		print '<div class="cv"><a href="'.$base_url.'/sites/default/files/cv/'.$node->field_cv['und'][0]['filename'].'">Curriculum Vitae</a></div>';
	}
	
	print '</div>';
}

// Contact

if ($node->field_email_address[und][0]['safe_value'] || $node->field_office['und'][0]['safe_value'] || $node->field_phone['und'][0]['safe_value']) {
	print '<div class="contact"><h4>Contact</h4>';

	if ($node->field_email_address[und][0]['safe_value']) {
		print '<div class="email"><a href="mailto:'.$node->field_email_address['und'][0]['safe_value'].'">'.$node->field_email_address['und'][0]['safe_value'].'</a></div>';
	}

	if ($node->field_office['und'][0]['safe_value']) {
		print '<div class="office">'.$node->field_office['und'][0]['safe_value'].'</div>';
	}

	if ($node->field_phone['und'][0]['safe_value']) {
		print '<div class="phone">'.$node->field_phone['und'][0]['safe_value'].'</div>';
	}
	
	print '</div>';
}

// Group and Interests

if ($node->field_group['und'][0]['taxonomy_term']->name || $node->field_interests['und'][0]['safe_value']) {
	print '<div class="group-interests"><h4>Research & Teaching Group and Interests</h4>';

	if ($node->field_group['und'][0]['taxonomy_term']->name) {
		foreach ($node->field_group['und'] as $group) {
			print '<div class="group">'.$group['taxonomy_term']->name.'</div>';
		}
	}

	if ($node->field_interests['und'][0]['safe_value']) {
		print '<div class="interests">'.$node->field_interests['und'][0]['safe_value'].'</div>';
	}
	
	print '</div>';
}
?>