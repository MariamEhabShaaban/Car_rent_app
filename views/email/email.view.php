
<?php $base = 'https://816ef16bd6eb.ngrok-free.app'; ?>


<div style="max-width: 600px; margin: auto; padding: 20px; background-color: #f3f4f6; border-radius: 16px; font-family: Arial, sans-serif; color: #1f2937;">
  <h2 style="text-align: center; font-size: 24px; margin-bottom: 20px;">Customer Request</h2>

  <!-- ID Front -->
  <div style="margin-bottom: 16px;">
    <strong>ID Front:</strong><br>
    <img src="<?= $base ?>/uploads/customers/id/front/<?= $request['book_id'] . '.' . $request['id_front'] ?>" alt="ID Front" style="width: 100%; height: auto; border-radius: 8px;">
  </div>

  <!-- ID Back -->
  <div style="margin-bottom: 16px;">
    <strong>ID Back:</strong><br>
    <img src="<?= $base ?>/uploads/customers/id/back/<?= $request['book_id'] . '.' . $request['id_back'] ?>" alt="ID Back" style="width: 100%; height: auto; border-radius: 8px;">
  </div>

  <!-- License -->
  <div style="margin-bottom: 16px;">
    <strong>License:</strong><br>
    <img src="<?= $base ?>/uploads/customers/license/<?= $request['book_id'] . '.' . $request['license'] ?>" alt="License" style="width: 100%; height: auto; border-radius: 8px;">
  </div>

  <!-- Passport -->
  <div style="margin-bottom: 16px;">
    <strong>Passport:</strong><br>
    <img src="<?= $base ?>/uploads/customers/passport/<?= $request['book_id'] . '.' . $request['passport'] ?>" alt="Passport" style="width: 100%; height: auto; border-radius: 8px;">
  </div>

  <!-- Car Image -->
  <div style="margin-bottom: 16px;">
    <strong>Car Model: <?= $request['model_name'] ?></strong><br>
    <img src="<?= $base ?>/uploads/cars/<?= $request['car_id'] . '.' . $request['image_ext'] ?>" alt="Car" style="width: 100%; height: auto; border-radius: 8px;">
  </div>

  <!-- Date -->
  <div style="margin-bottom: 12px;">
    <strong>Needed Time:</strong>
    <div style="background: white; padding: 10px; border-radius: 8px;">
      <?= $request['date'] ?>
    </div>
  </div>

  <!-- Payment -->
  <div style="margin-bottom: 12px;">
    <strong>Payment Method:</strong>
    <div style="background: white; padding: 10px; border-radius: 8px;">
      <?= $request['payment_method'] ?>
    </div>
  </div>

  <!-- Action Buttons -->
  <div style="text-align: center; margin-top: 24px;">
    <a href="<?= $base ?>/accept?token=<?=$request['token']?>" style="display: inline-block; background-color: #10b981; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; margin-right: 10px;">
      Accept
    </a>
    <a href="<?= $base ?>/reject?token=<?=$request['token']?>" style="display: inline-block; background-color: #ef4444; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">
      Reject
    </a>
  </div>
</div>
