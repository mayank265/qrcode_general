import csv
import qrcode
import hashlib

try:
    from PIL import Image
except ImportError:
    import Image

filename  = 'sample_data.csv'
with open(filename) as csv_file:
    csv_reader = csv.reader(csv_file, delimiter=',')
    line_count = 0
    for row in csv_reader:

        try:

            data = ""
            hash_encode_string = row[1].strip() + 'KingQueeN1'  #KingQueeN1 is a password kind of stuff. 
            print(hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest())

            data = row[0].strip() + "\n" + row[1].strip() + "\n" + row[2].strip() + "\n" + row[3].strip() + "\n" + \
                   row[4].strip() + "\n" + row[5].strip() + "\n" + row[6].strip() + "\n" + row[
                       7].strip() + "\n" + row[8].strip() + "\n" + hashlib.md5(hash_encode_string.encode('utf-8')).hexdigest()

            qr = qrcode.QRCode(
                version=1,
                error_correction=qrcode.constants.ERROR_CORRECT_H,
                box_size=10,
                border=2,
            )

            qr.add_data(data)
            qr.make(fit=True)
            img = qr.make_image(fill_color="black", back_color="white")
            file_name = row[1].strip().split(' ')[0].title() + '_' + row[2] + '_PC' + '.png'
            image_file = open(file_name,
                              'wb')  # will open the file, if file does not exist, it will be created and opened.
            img.save(image_file)  # write qrcode encoded data to the image file.
            image_file.close()  # close the opened file handler.
        except Exception as e:
            print(e)
            print("Error")
