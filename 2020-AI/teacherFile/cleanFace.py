import cv2
import time

logfile = open("logging.txt", "r")
allFace = {}
for line in logfile:
    face = eval('[' + line + ']')
    allFace[face[0]] = face[1:]
    print(face[0], face[1:])
    # print(line, end='')

# print(allFace)


cap = cv2.VideoCapture("test.mp4")
# faceCascade = cv2.CascadeClassifier("models/haarcascade_frontalface_default.xml");

frameNum = 0

while cap.isOpened():
    success, img = cap.read()
    if success:
        frameNum = frameNum + 1
        # if frameNum < 1019: continue
        gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
        # faces = faceCascade.detectMultiScale(gray, 1.1, 4)  # 1.1, 4 #1.3, 5
        # faces = []
        if frameNum in allFace:
            faces = allFace[frameNum]
        else:
            faces = []
        if len(faces) > 0:
            # logfile.write(str(frameNum))
            for (x, y, w, h, person) in faces:
                cv2.rectangle(img, (x, y), (x + w, y + h), (255, 0, 0), 2)
                # cropped = gray[y:y+h, x:x+w]
                # cropped = cv2.resize(cropped, (43, 43))
                # person = classifier.predict([cropped.flatten()])
                print(frameNum, person)
                # print(person[0])
                # logfile.write(',' + str((x,y,w,h,namelist[person[0]])))
                cv2.putText(img, person, (x, y - 5), cv2.FONT_HERSHEY_COMPLEX, 0.5, (50, 180, 220), 2)
            # logfile.write("\n")
        cv2.imshow("Video", img)
        time.sleep(0.1)
    else:
        print("Video closed")
        break
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break
