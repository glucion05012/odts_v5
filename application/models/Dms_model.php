<?php
class Dms_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    // ----------------------------------------- START dms list queries -----------------------------------------
    public function dms_list_ajax($length, $start, $search){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where 
                                                                    (
                                                                    a.reference_no like ('%$search%') or 
                                                                    a.subject_name like ('%$search%')
                                                                    ) LIMIT $start, $length;");

        return $query->result_array();
    }

    public function dms_list_ajax_inbox($userid, $length, $start, $search){
        $query = $this->db->query("SELECT 
    a.*,
    b.main_category,
    c.sub_category,
    d.ts_action,
    d.ts_action_id,
    d.ts_attachment_type,
    d.ts_remarks,
    d.ts_forwarded_by_id,
    d.ts_forwarded_date,
    d.ts_timestamp_forwarded_date,
    d.ts_forwarded_to_id,
    d.ts_accepted_date,
    d.ts_timestamp_accepted_date,
    d.ts_transaction_id,
    d.ts_status,
    d.ts_office_id,
    d.ts_main_dms_id
FROM dms_dms a
LEFT JOIN conf_category b ON a.category_id = b.id
LEFT JOIN conf_sub_category c ON a.sub_category_id = c.id
LEFT JOIN (
    SELECT
        dt.id AS ts_transaction_id,
        dt.forwarded_by_id AS ts_forwarded_by_id,
        dt.forwarded_to_id AS ts_forwarded_to_id,
        dt.dms_id,
        dt.accepted_date AS ts_accepted_date,
        dt.timestamp_accepted_date AS ts_timestamp_accepted_date,
        dt.office_id AS ts_office_id,
        dt.status AS ts_status,
        ac.action AS ts_action,
        dt.action_id AS ts_action_id,
        dt.attachment_type AS ts_attachment_type,
        dt.remarks AS ts_remarks,
        dt.forwarded_date AS ts_forwarded_date,
        dt.timestamp_forwarded_date AS ts_timestamp_forwarded_date,
        dt.main_dms_id AS ts_main_dms_id
    FROM dms_transaction dt
    LEFT JOIN conf_action ac ON dt.action_id = ac.id
    WHERE dt.id IN (
        SELECT MAX(dt2.id) 
        FROM dms_transaction dt2 
        GROUP BY dt2.dms_id
    )
) AS d ON a.id = d.dms_id
WHERE 
    d.ts_forwarded_to_id = $userid AND
    (
        a.reference_no LIKE ('%$search%') OR 
        a.subject_name LIKE ('%$search%')
    ) AND 
    a.status = 'Active'
ORDER BY 
    CASE WHEN a.category_id = 13 THEN 0 ELSE 1 END,
    d.ts_forwarded_date ASC
LIMIT $start, $length;");

        return $query->result_array();
    }

    public function dms_list_ajax_inbox_count($userid){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where d.ts_forwarded_to_id = $userid and a.status = 'Active'");

        return $query->num_rows();
    }

    public function dms_list_ajax_inbox_red($userid, $length, $start, $search){
        $red_id = $_SESSION['red_userid'];

            $query = $this->db->query("SELECT 
        a.*,
        b.main_category,
        c.sub_category,
        d.ts_action,
        d.ts_action_id,
        d.ts_attachment_type,
        d.ts_remarks,
        d.ts_forwarded_by_id,
        d.ts_forwarded_date,
        d.ts_timestamp_forwarded_date,
        d.ts_forwarded_to_id,
        d.ts_accepted_date,
        d.ts_timestamp_accepted_date,
        d.ts_transaction_id,
        d.ts_status,
        d.ts_office_id,
        d.ts_main_dms_id
    FROM dms_dms a
    LEFT JOIN conf_category b ON a.category_id = b.id
    LEFT JOIN conf_sub_category c ON a.sub_category_id = c.id
    LEFT JOIN (
        SELECT
            dt.id AS ts_transaction_id,
            dt.forwarded_by_id AS ts_forwarded_by_id,
            dt.forwarded_to_id AS ts_forwarded_to_id,
            dt.dms_id,
            dt.accepted_date AS ts_accepted_date,
            dt.timestamp_accepted_date AS ts_timestamp_accepted_date,
            dt.office_id AS ts_office_id,
            dt.status AS ts_status,
            ac.action AS ts_action,
            dt.action_id AS ts_action_id,
            dt.attachment_type AS ts_attachment_type,
            dt.remarks AS ts_remarks,
            dt.forwarded_date AS ts_forwarded_date,
            dt.timestamp_forwarded_date AS ts_timestamp_forwarded_date,
            dt.main_dms_id AS ts_main_dms_id
        FROM dms_transaction dt
        LEFT JOIN conf_action ac ON dt.action_id = ac.id
        WHERE dt.id IN (
            SELECT MAX(dt2.id) 
            FROM dms_transaction dt2 
            GROUP BY dt2.dms_id
        )
    ) AS d ON a.id = d.dms_id
    WHERE 
        d.ts_forwarded_to_id = $red_id AND
        c.id IN (100, 99, 138) AND
        (
            a.reference_no LIKE ('%$search%') OR 
            a.subject_name LIKE ('%$search%')
        ) AND 
        a.status = 'Active'
    ORDER BY 
        CASE WHEN a.category_id = 13 THEN 0 ELSE 1 END,
        d.ts_forwarded_date ASC
    LIMIT $start, $length;");

            return $query->result_array();
    }

    public function dms_list_ajax_inbox_red_count($userid){
        $red_id = $_SESSION['red_userid'];

        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where d.ts_forwarded_to_id = $red_id and c.id IN (100, 99, 138) and a.status = 'Active'");

        return $query->num_rows();
    }
    
    public function dms_list_ajax_outbox($userid, $length, $start, $search){
        $query = $this->db->query("SELECT 
                                    a.*,
                                    b.main_category,
                                    c.sub_category,
                                    d.ts_action,
                                    d.ts_action_id,
                                    d.ts_attachment_type,
                                    d.ts_remarks,
                                    d.ts_forwarded_by_id,
                                    d.ts_forwarded_date,
                                    d.ts_timestamp_forwarded_date,
                                    d.ts_forwarded_to_id,
                                    d.ts_accepted_date,
                                    d.ts_timestamp_accepted_date,
                                    d.ts_transaction_id,
                                    d.ts_status,
                                    d.ts_office_id,
                                    d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b ON a.category_id = b.id
                                LEFT JOIN conf_sub_category c ON a.sub_category_id = c.id
                                LEFT JOIN (
                                    SELECT 
                                        dt.dms_id,
                                        dt.id AS ts_transaction_id,
                                        dt.forwarded_by_id AS ts_forwarded_by_id,
                                        dt.forwarded_to_id AS ts_forwarded_to_id,
                                        dt.accepted_date AS ts_accepted_date,
                                        dt.timestamp_accepted_date AS ts_timestamp_accepted_date,
                                        dt.office_id AS ts_office_id,
                                        dt.status AS ts_status,
                                        ac.action AS ts_action,
                                        dt.action_id AS ts_action_id,
                                        dt.attachment_type AS ts_attachment_type,
                                        dt.remarks AS ts_remarks,
                                        dt.forwarded_date AS ts_forwarded_date,
                                        dt.timestamp_forwarded_date AS ts_timestamp_forwarded_date,
                                        dt.main_dms_id AS ts_main_dms_id
                                    FROM (
                                        SELECT 
                                            dt.dms_id,
                                            MAX(dt.id) AS max_id
                                        FROM dms_transaction dt
                                        GROUP BY dt.dms_id
                                    ) latest_transactions
                                    JOIN dms_transaction dt ON dt.dms_id = latest_transactions.dms_id AND dt.id = latest_transactions.max_id
                                    LEFT JOIN conf_action ac ON dt.action_id = ac.id
                                ) AS d ON a.id = d.dms_id
                                WHERE 
                                    EXISTS (
                                        SELECT 1 
                                        FROM dms_transaction dtt 
                                        WHERE dtt.forwarded_by_id = $userid 
                                        AND dtt.dms_id = a.id
                                    )
                                    AND a.status = 'Active'
                                    AND (
                                        a.reference_no LIKE CONCAT('%$search%') OR 
                                        a.subject_name LIKE CONCAT('%$search%')
                                    )
                                LIMIT $start, $length;");

        return $query->result_array();
    }

    public function dms_list_ajax_outbox_count($userid){
        $query = $this->db->query("
            SELECT COUNT(DISTINCT a.id) AS total
            FROM dms_dms a
            WHERE a.status = 'Active'
            AND EXISTS (
                SELECT 1 
                FROM dms_transaction dtt 
                WHERE dtt.forwarded_by_id = $userid 
                    AND dtt.dms_id = a.id
            )
        ");

        return $query->row()->total;
    }
    
    public function dms_list_ajax_closed($userid, $length, $start, $search){
        $query = $this->db->query("SELECT 
                                    a.*,
                                    b.main_category,
                                    c.sub_category,
                                    d.ts_action,
                                    d.ts_action_id,
                                    d.ts_attachment_type,
                                    d.ts_remarks,
                                    d.ts_forwarded_by_id,
                                    d.ts_forwarded_date,
                                    d.ts_timestamp_forwarded_date,
                                    d.ts_forwarded_to_id,
                                    d.ts_accepted_date,
                                    d.ts_timestamp_accepted_date,
                                    d.ts_transaction_id,
                                    d.ts_status,
                                    d.ts_office_id,
                                    d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b ON a.category_id = b.id
                                LEFT JOIN conf_sub_category c ON a.sub_category_id = c.id
                                LEFT JOIN (
                                    SELECT 
                                        dt.dms_id,
                                        dt.id AS ts_transaction_id,
                                        dt.forwarded_by_id AS ts_forwarded_by_id,
                                        dt.forwarded_to_id AS ts_forwarded_to_id,
                                        dt.accepted_date AS ts_accepted_date,
                                        dt.timestamp_accepted_date AS ts_timestamp_accepted_date,
                                        dt.office_id AS ts_office_id,
                                        dt.status AS ts_status,
                                        ac.action AS ts_action,
                                        dt.action_id AS ts_action_id,
                                        dt.attachment_type AS ts_attachment_type,
                                        dt.remarks AS ts_remarks,
                                        dt.forwarded_date AS ts_forwarded_date,
                                        dt.timestamp_forwarded_date AS ts_timestamp_forwarded_date,
                                        dt.main_dms_id AS ts_main_dms_id
                                    FROM (
                                        SELECT 
                                            dt.dms_id,
                                            MAX(dt.id) AS max_id
                                        FROM dms_transaction dt
                                        GROUP BY dt.dms_id
                                    ) latest_transactions
                                    JOIN dms_transaction dt ON dt.dms_id = latest_transactions.dms_id AND dt.id = latest_transactions.max_id
                                    LEFT JOIN conf_action ac ON dt.action_id = ac.id
                                ) AS d ON a.id = d.dms_id
                                WHERE 
                                    EXISTS (
                                        SELECT 1 
                                        FROM dms_transaction dtt 
                                        WHERE dtt.forwarded_by_id = $userid 
                                        AND dtt.dms_id = a.id
                                    )
                                    AND a.status = 'Inactive'
                                    AND (
                                        a.reference_no LIKE CONCAT('%$search%') OR 
                                        a.subject_name LIKE CONCAT('%$search%')
                                    )
                                LIMIT $start, $length;");

        return $query->result_array();
    }

    public function dms_list_ajax_closed_count($userid){
       $query = $this->db->query("
            SELECT COUNT(DISTINCT a.id) AS total
            FROM dms_dms a
            WHERE a.status = 'Inactive'
            AND EXISTS (
                SELECT 1 
                FROM dms_transaction dtt 
                WHERE dtt.forwarded_by_id = $userid 
                    AND dtt.dms_id = a.id
            )
        ");

        return $query->row()->total;
    }
    
    public function dms_list(){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id;");

        return $query->result_array();
    }

    public function dms_list_one($id){
        $id_dec=urldecode($id);
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where a.reference_no like '%$id_dec%' OR a.subject_name like '%$id_dec%';");

        return $query->result_array();
    }
    
    public function dms_list_one_id($id){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where a.id=$id;");

        return $query->result_array();
    }

    public function dms_list_confidential(){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where a.document_type = 'Confidential';");

        return $query->result_array();
    }

    public function dms_list_forward_to(){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where d.ts_forwarded_to_id = ".$_SESSION['userid']." and a.status = 'Active'");

        return $query->result_array();
    }

    public function dms_list_forward_by(){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_transaction e
                                LEFT JOIN dms_dms a on a.id = e.dms_id
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where e.forwarded_by_id = ".$_SESSION['userid']." and a.status = 'Active'");

        return $query->result_array();
    }

    public function dms_list_closed(){
        $query = $this->db->query("SELECT 
                                a.*,
                                b.main_category,
                                c.sub_category,
                                d.ts_action,
                                d.ts_action_id,
                                d.ts_attachment_type,
                                d.ts_remarks,
                                d.ts_forwarded_by_id,
                                d.ts_forwarded_date,
                                d.ts_timestamp_forwarded_date,
                                d.ts_forwarded_to_id,
                                d.ts_accepted_date,
                                d.ts_timestamp_accepted_date,
                                d.ts_transaction_id,
                                d.ts_status,
                                d.ts_office_id,
                                d.ts_main_dms_id
                                FROM dms_dms a
                                LEFT JOIN conf_category b on a.category_id=b.id
                                LEFT JOIN conf_sub_category c on a.sub_category_id=c.id
                                LEFT JOIN (
                                            select
                                                dt.id as ts_transaction_id,
                                                dt.forwarded_by_id as ts_forwarded_by_id,
                                                dt.forwarded_to_id as ts_forwarded_to_id,
                                                dt.dms_id,
                                                dt.accepted_date as ts_accepted_date,
                                                dt.timestamp_accepted_date as ts_timestamp_accepted_date,
                                                dt.office_id as ts_office_id,
                                                dt.status as ts_status,
                                                ac.action as ts_action,
                                                dt.action_id as ts_action_id,
                                                dt.attachment_type as ts_attachment_type,
                                                dt.remarks as ts_remarks,
                                               	dt.forwarded_date as ts_forwarded_date,
                                               	dt.timestamp_forwarded_date as ts_timestamp_forwarded_date,
                                                dt.main_dms_id as ts_main_dms_id
                                            from dms_transaction as dt
                                            left join conf_action as ac on dt.action_id=ac.id
                                    WHERE dt.id IN (SELECT max(dt2.id) from dms_transaction dt2
                                    group by dt2.dms_id
                                        ))as d on a.id=d.dms_id where a.status = 'Inactive';");

        return $query->result_array();
    }
    // ----------------------------------------- END dms list queries -----------------------------------------

    public function dms_transaction_list(){
        $query = $this->db->query("SELECT
                            b.reference_no,
                            b.category_id,
                            c.main_category as category,
                            b.sub_category_id,
                            d.sub_category,
                            b.subject_name,
                            b.document_type,
                            a.*,
                            e.action as action_name
                            FROM dms_transaction a
                            LEFT JOIN dms_dms b on a.dms_id=b.id
                            LEFT JOIN conf_category c on b.category_id=c.id
                            LEFT JOIN conf_sub_category d on b.sub_category_id=d.id
                            LEFT JOIN conf_action e on a.action_id=e.id order by a.id DESC;");

        return $query->result_array();
    }
    public function dms_transaction_list_one_ajax($id){
        $query = $this->db->query("SELECT
                            b.reference_no,
                            b.category_id,
                            c.main_category,
                            b.sub_category_id,
                            d.sub_category,
                            b.subject_name,
                            b.document_type,
                            a.*,
                            e.action,
                            f.id as notice_id,
                            g.att_cnt
                            FROM dms_transaction a
                            LEFT JOIN dms_dms b on a.dms_id=b.id
                            LEFT JOIN conf_category c on b.category_id=c.id
                            LEFT JOIN conf_sub_category d on b.sub_category_id=d.id
                            LEFT JOIN conf_action e on a.action_id=e.id
                            LEFT JOIN notice f on f.dms_id=a.dms_id  
                            LEFT JOIN (select count(*) as att_cnt, dms_transaction_id from dms_attachments group by dms_transaction_id) as g on g.dms_transaction_id = a.id
                            where a.dms_id=$id
                            ORDER BY `a`.`id` DESC;");

        return $query->result_array();
    }

    public function dms_transaction_list_one($id){
        $decid = base64_decode($id);
        $query = $this->db->query("SELECT
                                b.reference_no,
                                b.category_id,
                                c.main_category,
                                b.sub_category_id,
                                d.sub_category,
                                b.subject_name,
                                b.document_type,
                                a.*,
                                e.action,
                                EXISTS (
                                    SELECT 1
                                    FROM notice n
                                    WHERE n.dms_id = a.dms_id
                                ) AS so_exists
                            FROM dms_transaction a
                            LEFT JOIN dms_dms b ON a.dms_id = b.id
                            LEFT JOIN conf_category c ON b.category_id = c.id
                            LEFT JOIN conf_sub_category d ON b.sub_category_id = d.id
                            LEFT JOIN conf_action e ON a.action_id = e.id
                            WHERE a.id = $decid;");

        return $query->row_array();
    }

    
    public function dms_transaction_attach_one_ajax($id){
        $query = $this->db->query("SELECT * FROM dms_attachments where dms_transaction_id = $id;");
        return $query->result_array();
    }

    public function dms_attachment_list(){
        $query = $this->db->query("SELECT * FROM dms_attachments;");
        return $query->result_array();
    }
    
    public function create_transaction(){

        // insert dms_dms
        $data = array(
            'date_created' => date("Y-m-d"),
            'created_by_id' => $this->input->post('userid'),
            'category_id' => $this->input->post('category_id'),
            'sub_category_id' => $this->input->post('sub_category_id'),
            'subject_name' => $this->input->post('subject_name'),
            'document_type' => $this->input->post('document_type'),
            'status' => 'Active'
        );
        
        $this->db->insert('dms_dms', $data);

        $dms_transaction_id = $this->db->insert_id();
        
        // add reference no
        $dms_id = $this->db->insert_id();
        $ref_no = 'ODTS-NCR-'.date("Y").'-'.sprintf("%06d", $dms_id);
        
        $datar = array(
            'reference_no' => $ref_no,
        );

        $this->db->where('id', $dms_id);
        $this->db->update('dms_dms', $datar);

        // insert dms_transaction
        $datatr = array(
            'office_id' => $this->input->post('office_id'),
            'dms_id' => $dms_id,
            'forwarded_by_id' => $this->input->post('userid'),
            'forwarded_date' => date("Y-m-d"),
            'forwarded_to_id' => $this->input->post('personnel_id'),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => 'Pending',
            'attachment_type' => $this->input->post('attach_type'),
        );
        
        $this->db->insert('dms_transaction', $datatr);

        $datasub = array(
            'subject_name' => $this->input->post('subject_name'),
        );

        $this->db->where('id', $this->input->post('dms_id'));
        $this->db->update('dms_dms', $datasub);

        // FILED/CLOSED
        if($this->input->post('action_id') == 0){
            $datar = array(
                'status' => 'Inactive',
            );
    
            $this->db->where('id', $this->input->post('dms_id'));
            $this->db->update('dms_dms', $datar);

            // Closed for notice db
            $datan = array(
                'status' => 'Closed/Denied',
            );
    
            $this->db->where('dms_id', $this->input->post('dms_id'));
            $this->db->update('notice', $datan);
        }
        

        $query = $this->db->query("SELECT * FROM dms_dms WHERE id = '$dms_id'");
        return $query->result_array();
    }
    
    public function create_transaction_attachment($file){

        $dms_id_query = $this->db->query('select * from dms_transaction ORDER BY id DESC LIMIT 1');
        foreach($dms_id_query->result() as $diq){
            $dms_id = $diq->id;
        }

        $data = array(
            'dms_transaction_id' => $dms_id,
            'file_name' => $file['file_name'],
            'file_location' => $file['file_location'],
            'date_uploaded' => date("Y-m-d"),
            'type' => $file['type'],
        );
        
        $this->db->insert('dms_attachments', $data);
    }

    
    public function accept_transaction(){
        date_default_timezone_set('Asia/Manila');
        $data = array(
            'accepted_date' => date("Y-m-d"),
            'timestamp_accepted_date' => date("Y-m-d h:i:s"),
        );

        $this->db->where('id', $this->input->post('transaction_id'));
        $this->db->update('dms_transaction', $data);
    }

    public function process_transaction(){
        // insert dms_transaction
        $datatr = array(
            'office_id' => $this->input->post('office_id'),
            'dms_id' => $this->input->post('dms_id'),
            'forwarded_by_id' => $this->input->post('userid'),
            'forwarded_date' => date("Y-m-d"),
            'forwarded_to_id' => $this->input->post('personnel_id'),
            'action_id' => $this->input->post('action_id'),
            'remarks' => $this->input->post('remarks'),
            'status' => $this->input->post('status'),
            'attachment_type' => $this->input->post('attach_type'),
        );
        
        $this->db->insert('dms_transaction', $datatr);
        $dms_transaction_id = $this->db->insert_id();

        
       $datasub = array(
            'subject_name' => $this->input->post('subject_name'),
        );

        $this->db->where('id', $this->input->post('dms_id'));
        $this->db->update('dms_dms', $datasub);

        // FILED/CLOSED
        if($this->input->post('action_id') == 0){
            $datar = array(
                'status' => 'Inactive',
            );
    
            $this->db->where('id', $this->input->post('dms_id'));
            $this->db->update('dms_dms', $datar);

            // Closed for notice db
            $datan = array(
                'status' => 'Closed/Denied',
            );
    
            $this->db->where('dms_id', $this->input->post('dms_id'));
            $this->db->update('notice', $datan);
        }

        // APPROVED
        if($this->input->post('isautoSO') == 1){
            if($this->input->post('action_id') == 22 AND $_SESSION['userid'] == $_SESSION['red_userid'] AND $this->input->post('sub_category_id') == 75){
                $datar = array(
                    'status' => 'Inactive',
                );
        
                $this->db->where('id', $this->input->post('dms_id'));
                $this->db->update('dms_dms', $datar);

                $datat = array(
                    'status' => 'Closed',
                );
        
                $this->db->where('id', $dms_transaction_id);
                $this->db->update('dms_transaction', $datat);

                // apprrove for notice db
                $not_qry = $this->db->get_where('notice', array('dms_id' => $this->input->post('dms_id')));
                foreach($not_qry->result() as $nq){
                    $not_id = $nq->id;
                    $subject = $nq->subject;
                    $location = $nq->venue_nom;
                    $schedule = $nq->date_nom;
                    $created_by_id = $nq->created_by;
                }
                
                $querycntnot = $this->db->query('SELECT * FROM notice where status="Approved"');
                $noticeCntApp = $querycntnot->num_rows();
                
                date_default_timezone_set('Asia/Manila');
                $soNo = $not_id;
                $soNofl = 'No. ' . date("Y") . ' - ' .sprintf('%03d', $noticeCntApp-1); #notice count

                $datan = array(
                    'status' => 'Approved',
                    'so_no' => $soNofl,
                    'date_approved' => date("Y-m-d"),
                );
        
                $this->db->where('dms_id', $this->input->post('dms_id'));
                $this->db->update('notice', $datan);
                
                //  add to bulletin
                $data = array(
                    'subject' => $subject,
                    'location' => $location,
                    'schedule' => $schedule,
                    'created_by_id' => $created_by_id,
                    'status' => 1,
                    'type' => $not_id,
                );

                $this->db->insert('conf_announcements', $data);
            }
        }

        $query = $this->db->query("SELECT a.*, b.reference_no FROM dms_transaction a left join dms_dms b on a.dms_id=b.id WHERE a.id = '$dms_transaction_id'");
        return $query->result_array();
    }

}
?>