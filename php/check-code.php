<?php
require_once(__DIR__ . '/../db/connection.db.php');

if (isset($_POST['referralCode'])) {
    $referralCode = $_POST['referralCode'];
    $db = getDBConn();

    try {
        $stmt = $db->prepare('SELECT discount FROM ReferralCodes WHERE code = ? AND valid = 1');
        $stmt->execute([$referralCode]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo json_encode(['valid' => true, 'discount' => $result['discount']]);
        } else {
            echo json_encode(['valid' => false]);
        }
    } catch (PDOException $e) {
        echo json_encode(['valid' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['valid' => false, 'error' => 'No referral code provided']);
}
?>
