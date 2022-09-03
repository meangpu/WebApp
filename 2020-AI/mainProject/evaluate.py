file1, file2 = ("logging1.txt", "logging.txt")  # solution, prediction
missFrame = 0
correctFace = 0
mistakeFace = 0


def isValidPos(realFace, predFace):
    # is mid Position of predict face align inside realFace
    x1, y1 = (predFace[0] + predFace[2] / 2, predFace[1] + predFace[3] / 2)
    x, y, w, h = realFace[:-1]
    if x < x1 < x + w and y < y1 < y + h:
        return True
    else:
        return False


def isValid(faceL1, faceL2):
    realFace = faceL1[0][-1]
    print(realFace, 'real')
    for predFace in faceL2:
        if realFace == predFace[-1]:
            print(predFace[-1], 'true')
            if isValidPos(faceL1[0], predFace):
                print("valide pos")
                return True
            else:
                print("invalid pos")
        else:
            print(predFace[-1], 'false')
    return False


# read list of all solution
logfile1 = open(file1, "r")
allFace1 = {}
for line in logfile1:
    face = eval('[' + line + ']')
    allFace1[face[0]] = face[1:]
    # print(face[0], face[1:])

# read list of all prediction
logfile2 = open(file2, "r")
allFace2 = {}
for line in logfile2:
    face = eval('[' + line + ']')
    allFace2[face[0]] = face[1:]
    # print(face[0], face[1:])

print(len(allFace1), len(allFace2))

for frame in allFace1:
    print(frame, allFace1[frame])
    if frame in allFace2:
        print(frame, allFace2[frame])
        print(isValid(allFace1[frame], allFace2[frame]))
        if isValid(allFace1[frame], allFace2[frame]):
            correctFace = correctFace + 1
        else:
            mistakeFace = mistakeFace + 1
    else:
        print('Not detect')
        missFrame = missFrame + 1
print("\nEvaluate result of " + file2)
print("Number of undetected faces:", missFrame)
print("Correct face:", correctFace)
print("Incorrect face:", mistakeFace)
