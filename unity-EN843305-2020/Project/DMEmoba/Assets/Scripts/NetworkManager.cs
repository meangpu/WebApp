using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;
using Colyseus;
using System;

public class NetworkManager : MonoBehaviour
{

    public Button connectButton;

    private PlayerPosition userPlayerScript;

    public Client client;
    string endPoint = "ws://54.251.89.32:2567";
    public Room<State> room;
    string roomName  = "arena";
    string status = "";
    public bool connectionState = false;
    public TextMeshProUGUI statusText;
    public GameObject otherPlayer;

    public GameObject[] allPlayer;

    // Start is called before the first frame update
    void Start()
    {
        connectButton.onClick.AddListener(ConnectToServer);
        userPlayerScript = GameObject.Find("Player").GetComponent<PlayerPosition>();
    }

    // Update is called once per frame
    void Update()
    {
        UpdateStatus();
    }

    async void ConnectToServer()
    {
        status = "Connecting";
        client = new Colyseus.Client(endPoint);
        try {
            room = await client.JoinOrCreate<State>(roomName);
            status = "Connected at " + room.Name + " ID: " + room.SessionId;
            connectionState = true;

            userPlayerScript.ChangeName(room.SessionId);
            room.State.players.OnAdd += OnPlayerAdd;

        } catch (Exception ex) {
            status = "Connection failed";
            Debug.Log(ex);
        }
        
    }

    void UpdateStatus()
    {
        statusText.text = status;
    }

    void OnPlayerAdd(Player player, string key)
    {
        if (key != room.SessionId)
        {
            var newPlayer = Instantiate(otherPlayer, new Vector3(0f, 0f, 0f), Quaternion.identity);
            newPlayer.name = key;
            newPlayer.GetComponent<PlayerPosition>().ChangeName(key);
            player.OnChange += (changes) =>
            {
                if (room.SessionId != key)
                {
                    var objectRef = GameObject.Find(key);
                    changes.ForEach( (obj) => {
                        if (obj.Field == "x")
                        {
                            objectRef.transform.position = new Vector3(float.Parse(obj.Value.ToString()), objectRef.transform.position.y, objectRef.transform.position.z);
                        } else if(obj.Field == "y")
                        {
                            objectRef.transform.position = new Vector3(objectRef.transform.position.x, objectRef.transform.position.y, float.Parse(obj.Value.ToString()));
                        }
                    });
                   
                }
               
            };
        }
    }
}
